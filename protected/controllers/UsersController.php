<?php

class UsersController extends Controller
{
	public $defaultAction = 'home';
	
	public function init(){
		parent::init();
		//$this->MAIN_MENU_ARRAY[5] = 'selected_menu';
	}
	
	public function filters()
	{
		return array(
			array('application.filters.StringFilter'),
			/*array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),*/
		);
	}
	
	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			//'action1'=>'path.to.ActionClass',
			//'action2'=>array(
			//	'class'=>'path.to.AnotherActionClass',
			//	'propertyName'=>'propertyValue',
			//),
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				//'propertyName'=>'propertyValue',
			),
		);
	}
	
	// LANDING PAGE
	public function actionHome(){
		
		$this->render('home');
	}
	
	// USER ACCOUNT PAGE
	public function actionIndex()
	{
		$this->layout = '//layouts/account';
		//pr(Yii::app()->user->getRole());
		$model=Users::Model()->findByPk(Yii::app()->user->id);
		//$model->scenario = 'register';
		//prd($model->attributes);
		if(Yii::app()->request->isPostRequest) {
			$model->u_date_updated = $this->TIME_STAMP;
		}
		$countryData = Countries::Model()->findAll();
		$countries = CHtml::listData($countryData, 'countryID', 'countryName');
		$stateData = Regions::Model()->findAll("countryID='".$model->u_main_country."'");
		$states = CHtml::listData($stateData, 'regionID', 'regionName');
		$cityData = Cities::Model()->findAll("regionID='".$model->u_main_state."'");
		$cities = CHtml::listData($cityData, 'cityID', 'cityName');
		// display the edit profile form
		$this->render('index',array('model'=>$model, 'countries'=>$countries, 'countryData'=>$countryData, 'states'=>$states, 'cities'=>$cities));
	}
	// LOGIN and LOGOUT 
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	// USER REGISTRATION
	public function actionSignup()
	{
		$model=new Users();
		$model->scenario = 'register';
		
		$countryData = Countries::Model()->findAll();
		$countries = CHtml::listData($countryData, 'countryID', 'countryName');
		// collect user input data
		if(Yii::app()->request->isPostRequest && !Yii::app()->request->isAjaxRequest)
		{
			$model->attributes=$_POST['Users'];
			if($model->u_type=='0'){
				$model->u_organization_name = NULL;
			} else {
				$model->u_fname = NULL;
				$model->u_lname = NULL;
				$model->u_gender = NULL;
			}
			$model->u_date_created = date("Y-m-d H:i:s");
			$dialCode = "";
			foreach($countryData as $country){
				if($country->countryID == $_POST['country']){
					$dialCode = $country->dialCode;
					break;
				}
			}
			$validate = $model->validate();
			$model->u_pphone = '+'.$dialCode.$model->u_pphone;
			// validate user input and redirect to the previous page if valid
			if($validate){
				$model->isNewRecord = true;
				$model->save(false);
				
				$id=$model->u_id;
				$role=$model->u_role;
				$permission = Yii::app()->db->createCommand("INSERT INTO authassignment (itemname, userid) VALUES (:urole, :uid)")->bindParam(':urole', $role)->bindParam(':uid', $id)->execute();
				$this->redirect(Yii::app()->user->returnUrl);
			} else {
			}
		}
		
		// display the signup form
		$this->render('signup',array('model'=>$model, 'countries'=>$countries, 'countryData'=>$countryData));
	}
	
	// SEND MAIL TO GET RESET PASSWORD LINK
	public function actionForgotpassword(){
		//prd(DOC_URL);
		$model = new Users();
		if(Yii::app()->request->isAjaxRequest) {
			if(Yii::app()->request->isPostRequest) {
				
			} else {
				$this->renderInternal(DOC_URL.'protected/views/users/forgotpassword.php',array('model'=>$model));
			}
		}else{
			
			if(Yii::app()->request->isPostRequest) {
				$code = $this->random(16);
				//prd($code);
				$user = Users::Model()->find(array('condition'=>"u_email=:email AND u_deleted='0'", 'params'=>array(':email'=>$_POST['Users']['u_email'])));
				//prd($user->attributes);
				$user->updateByPk($user->u_id, array('u_forgot_password_date'=>$this->TIME_STAMP, 'u_forgot_password_key'=>$code));
				$id = $this->encodeUser($user);
				
				$message = new YiiMailMessage();
				$message->view = "forgotpassword";
				$params = array('code'=>$code);
				$message->subject = "";
				$message->setBody($params, 'text/html');
				$message->addTo($user->u_email);
				$message->setFrom($this->adminEmail, 'User Notifications');
				//prd($message);
				Yii::app()->mail->send($message);
				Yii::app()->user->setFlash('login','<b>Success!</b> You will soonn recieve an email with a link to reset your password.');
				$this->redirect(array('users/login'));
			}
			$this->render('forgotpassword',array('model'=>$model));
		}
	}
	// RESET PASSWORD LINK
	public function actionResetpassword(){
		if(isset($_REQUEST['resetcode']) && $_REQUEST['resetcode']!="") {
			$criteria = new CDbCriteria();
			$criteria->condition = "u_forgot_password_key=BINARY :code AND TIME_TO_SEC( TIMEDIFF('".$this->TIME_STAMP."', u_forgot_password_date) ) < (2*60*60) AND u_deleted='0'";
			$criteria->params = array(':code'=>$_REQUEST['resetcode']);
			$user = Users::Model()->find($criteria);
			if(!empty($user)) {
				$model = new PasswordReset();
				if(Yii::app()->request->isPostRequest) {
					$update = 0;
					$model->u_pass = $_POST['PasswordReset']['u_pass'];
					$model->u_pass_confirm = $_POST['PasswordReset']['u_pass_confirm'];
					$valid = $model->validate();
					if($valid){
						$user->reset_password = 1;
						$user->u_forgot_password_date = '';
						$user->u_forgot_password_key = '';
						$user->u_date_updated = $this->TIME_STAMP;
						$user->u_pass = $_POST['PasswordReset']['u_pass'];
						$update = $user->save();
						//prd($user->getErrors());
					}
					//prd($model->getErrors());
					if($update == 1){
						Yii::app()->user->setFlash('login','<b>Success!</b> Try login with your new password.');
					} else {
						Yii::app()->user->setFlash('login','<b>Failure!</b> Couldn\'t reset your password.');
					}
					$this->redirect(array('users/login'));
				}
				$this->render('resetpassword', array('model'=>$model));
				
			} else {
				throw new CHttpException(404);
			}
		} else {
			throw new CHttpException(404);
		}
	}
	// UPDATE PASSWORD FROM PROFILE
	public function actionChangepassword(){
		$this->layout = '//layouts/account';
		
		$model = new PasswordReset();
		$model->scenario = 'change_password';
		//prd($model->attributes);
		if(Yii::app()->request->isPostRequest) {
			$update = 0;
			$model->u_pass_old = $_POST['PasswordReset']['u_pass_old'];
			$model->u_pass = $_POST['PasswordReset']['u_pass'];
			$model->u_pass_confirm = $_POST['PasswordReset']['u_pass_confirm'];
			$model->captcha_code = $_POST['PasswordReset']['captcha_code'];
			$valid = $model->validate();
			if($valid){
				$user = Users::Model()->findByPk(Yii::app()->user->id);
				if($user->u_pass !== md5($model->u_pass_old.$user->u_salt)){
					$model->addError('u_pass_old', 'Current pssword is incorrect.');
				}else{
					$user->reset_password = 1;
					$user->u_date_updated = $this->TIME_STAMP;
					$user->u_pass = $_POST['PasswordReset']['u_pass'];
					$update = $user->save();
				}
				//pr($user->getErrors());
			}
			//prd($model->getErrors());
			if($update == 1){
				Yii::app()->user->setFlash('index','<b>Success!</b> your password is updated.');
				$redirect = array('users/index');
				$this->redirect($redirect);
			} else {
				Yii::app()->user->setFlash('changepassword','<b>Failure!</b> Couldn\'t reset your password.');
			}
		}
		// display the edit profile form
		$this->render('changepassword',array('model'=>$model));
	}
	
	// DEACTIVATE ACCOUNT
	public function actionDeleteaccount(){
		$this->layout = '//layouts/account';
		$model = Users::Model()->findByPk(Yii::app()->user->id);
		if(Yii::app()->request->isAjaxRequest && Yii::app()->request->isPostRequest){
			//pr($model->u_pass);
			//pr(md5($_POST['Users']['u_pass'].$model->u_salt));
			if($model->u_pass !== md5($_POST['Users']['u_pass'].$model->u_salt)){
				$model->addError('u_pass','Password doesn\'t match.');
			}else if(!$model->hasErrors()){
				$model->updateByPk($model->u_id, array('u_is_deleted'=>'1', 'u_date_updated'=>$this->TIME_STAMP));
			}
			//prd($model->getErrors());
		}
		$this->render('deleteaccount', array('model'=>$model));
	}
	
	public function actionAutocomplete(){
		if(Yii::app()->request->isPostRequest && Yii::app()->request->isAjaxRequest){
			//print_r($_POST);exit;
			$RESPONCE = array();
			$RESPONCE['data'] = '';
			$RESPONCE['error'] = 0;
			$RESPONCE['message'] = '';
			
			$reqType = Yii::app()->request->getPost('req_type');
			$main_id = Yii::app()->request->getPost('main_id');
			switch($reqType){
				case '0': {// RETURN STATES LIST
					$states = CHtml::listData(Regions::Model()->findAll("countryID=".$main_id), 'regionID', 'regionName');
					$RESPONCE['data'] = $states;
				} break;
				case '1': {// RETURN CITIES LIST
					$cities = CHtml::listData(Cities::Model()->findAll("regionID=".$main_id), 'cityID', 'cityName');
					$RESPONCE['data'] = $cities;
				} break;
				case '2': {// VALIDATES EXISTING EMAILS
					$checkUserCriteria = new CDbCriteria();
					$checkUserCriteria->condition = "u_email=:u_email";
					$checkUserCriteria->params = array(":u_email"=>$model->u_email);
					$checkUser = Users::Model()->count($checkUserCriteria);
					if($checkUser > 0){
						$RESPONCE['error'] = 1;
						$RESPONCE['message'] = "Email already exists.";
					}
					$RESPONCE['data'] = $cities;
				} break;
			}
			echo CJSON::encode($RESPONCE);
		}else{
			throw new CHttpException(403);
		}
	}

}