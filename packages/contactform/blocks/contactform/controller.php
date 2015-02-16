<?php  defined('C5_EXECUTE') or die(_("Access Denied."));

class ContactFormBlockController extends BlockController {

	protected $btTable = 'btContactForm';
	protected $btInterfaceWidth = '240';
	protected $btInterfaceHeight = '350';

	public function getBlockTypeName()
	{
		return t('Contact form');
	}

	public function getBlockTypeDescription()
	{
		return t('Multilingual contact form to send emails.');
	}


	public function view()
	{
		$re = explode(';', $this->recipentEmails);
		$avalaibleEmails = array();
		if( count($re)>1 )
			{
				foreach ($re as $email)
					{
						$avalaibleEmails[] = trim($email);	
					}
			}
		else
			{
				$avalaibleEmails = trim($re[0]);	
			}
		$this->set('avalaibleEmails', $avalaibleEmails);  // need to loading image source
		
		
		$bv = new BlockView();
		$bv->setBlockObject($this->getBlockObject());
		$this->set('blockURL', $bv->getBlockURL());  // need to loading image source
	}


	public function action_contactform_submit()
	{
		if (!$this->isPost()) return;
		$post = $this->post();

		$name = htmlspecialchars(trim($post['contactFormNameInput']));
		$email = htmlspecialchars(trim($post['contactFormEmailInput']));
		$message = htmlspecialchars(trim($post['contactFormMessageInput']));
		$recipent = htmlspecialchars(trim($post['contactFormRecipentInput']));


		/* VALIDATION */
		$isError = false;

		if(empty($name) || strlen($name)>100)
			{ $this->set('nameInputError', true); $isError=true; }
		if(empty($email) || strlen($email)>100 || !filter_var($email, FILTER_VALIDATE_EMAIL))
			{ $this->set('emailInputError', true); $isError=true; }
		if(empty($message) || strlen($message)>1000)
			{ $this->set('messageInputError', true); $isError=true; }

		if($isError) {
			/* SET VALUES TO VIEW */
			$this->set('nameInputValue', $name);
			$this->set('emailInputValue', $email);
			$this->set('messageInputValue', $message);

			/* SHOW ERROR MESSAGE AND FORM */
			$this->set('error', true);
			return;
		}

		/* SEND MESSAGE */
		$this->send($name, $recipent, $email, $message);

		/* SHOW SUCCESS MESSAGE */
		$this->set('success', true);
	}


	public function action_contactform_ajax_submit()
	{
		$js = Loader::helper('json');
		
		$result = array();
		$result['highlight'] = array();
		$result['highlight']['name'] = false;
		$result['highlight']['email'] = false;
		$result['highlight']['message'] = false;

		if (!$this->isPost())
			{
				$result['state'] = 'error';
				echo $js->encode($result);
				exit();
			}
		$post = $this->post();

		$name = htmlspecialchars(trim($post['contactFormNameInput']));
		$email = htmlspecialchars(trim($post['contactFormEmailInput']));
		$message = htmlspecialchars(trim($post['contactFormMessageInput']));
		$recipent = htmlspecialchars(trim($post['contactFormRecipentInput']));


		/* VALIDATION */
		$isError = false;

		if(empty($name) || strlen($name)>100)
			{ $result['highlight']['name'] = true; $isError=true; }
		if(empty($email) || strlen($email)>100 || !filter_var($email, FILTER_VALIDATE_EMAIL))
			{ $result['highlight']['email'] = true; $isError=true; }
		if(empty($message) || strlen($message)>1000)
			{ $result['highlight']['message'] = true; $isError=true; }

		if($isError) {
			$result['state'] = 'error';
			echo $js->encode($result);
			exit();
		}

		/* SEND MESSAGE */
		$this->send($name, $recipent, $email, $message);

		/* SHOW SUCCESS MESSAGE */
		$result['state'] = 'success';
		echo json_encode($result);
		exit();
	}


	private function send($name, $recipent, $email, $message)
	{
		$mh = Loader::helper('mail');
		$mh->setSubject(SITE.' - '.$this->getBlockTypeName().' ('.$name.')');
		$mh->setBody(	t('Name').': '.$name."\r\n".
				t('Email').': '.$email."\r\n".
				t('Message').': \r\n'.$message	);

		$mh->setBodyHTML('<!DOCTYPE html>
				<html lang="'.LANGUAGE.'">
				<head>
					<meta charset="utf-8" />
					<title>'.SITE.' - '.$this->getBlockTypeName().' ('.$name.')</title>
				</head>
				<body>
					<div style="margin:0;padding:20px;font:14px Verdana,Arial,sans-serif;background:#39F;">
						<div style="margin:0;padding:10px 20px;color:#444;background:#fff;border-radius:15px;">
							<h2 style="margin:0;padding:10px;font-weight:bold;text-align:center;border-bottom:1px solid #eee;">'.$this->getBlockTypeName().'</h2>
							<div style="margin:0;padding:10px 30px;">
								<div style="margin-bottom:15px;"><b>'.t('Name').'</b>: '.$name.'</div>
								<div style="margin-bottom:15px;"><b>'.t('Email').'</b>: <a href="mailto:'.$email.'">'.$email.'</a></div>
								<div><b>'.t('Message').'</b>: <br/>'.str_replace("\r\n",'<br/>',$message).'</div>
							</div>
							<div style="margin:0;padding:10px;font-size:12px;text-align:center;border-top:1px solid #eee;">
								<div>'.date(t('Y-m-d H:i:s'), time()).'</div>
							</div>
						</div>
					</div>
				</body>
				</html>'	);

		$mh->to($recipent);
		$mh->from($email);
		@$mh->sendMail();
	}



}
