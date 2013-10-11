<?php
if  ($session->check('Message.auth')) $session->flash('auth');  
$this->pageTitle = 'ログイン認証';
echo $form->create('User', array('action' => 'login'));  
echo $form->input('username', array('label' => 'ご利用者名'));  
echo $form->input('password', array('label' => 'パスワード'));      
echo $form->end('ログイン'); 
?>
