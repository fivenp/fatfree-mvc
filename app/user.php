<?php 

class User extends Controller {

	function afterroute($f3) {
		echo View::instance()->render('layouts/login.php');
	}

	/** 
	Display login form
	**/
	function login($f3) {
		// $crypt = \Bcrypt::instance();
		// die(print_r($crypt->hash('mypwd',$f3->get('md.salt'))));
		$f3->clear('SESSION');
		$f3->set('title','BACKEND!');
		$f3->set('classname','login');
		$f3->set('template','views/user/login.php');
	}

	/** 
	Process login form
	**/
	function auth($f3) {
		$crypt = \Bcrypt::instance();
		$db = new \DB\SQL($f3->get('db.dsn'),$f3->get('db.user'),$f3->get('db.pass'));
		$users = new \DB\Cortex($db, 'users');

		if (!$f3->get('COOKIE.sent')){
			$f3->set('message_type','warning');
			$f3->set('message','Cookies must be enabled to enter this area');
		}  else {
			$user = $users->find(array('login=?',$f3->get('POST.username')));
			if($user){
				if($user[0]->password === $crypt->hash($f3->get('POST.password'),$f3->get('md.salt')) ){
					$f3->set('message_type','success');
					$f3->set('message','User / PW match');
					$f3->clear('COOKIE.sent');
					$f3->set('SESSION.admin_user',$user[0]->login);
					$f3->set('SESSION.admin_isadmin',$user[0]->admin);
					$f3->set('SESSION.admin_id',$user[0]->id);
					$f3->set('SESSION.admin_lastseen',time());

					$users->load(array('id = ?',$user[0]->id));
					$users->last_login = date('Y-m-d H:i:s');
					$users->last_login_remote_addr = ($f3->get('SERVER.HTTP_X_FORWARDED_FOR') ? $f3->get('SERVER.HTTP_X_FORWARDED_FOR') : $f3->get('SERVER.REMOTE_ADDR'));
					$users->save();

					$f3->reroute('/');
				} else {
					$f3->set('message_type','danger');
					$f3->set('message','PW false');
				}
				
			} else {
				$f3->set('message_type','danger');
				$f3->set('message','Please check your Username and Password');
			}
		}

		$this->login($f3);
	}

	/** 
	Terminate session
	**/
	function logout($f3) {
		$f3->clear('SESSION');
		$f3->reroute('/login');
	}
}