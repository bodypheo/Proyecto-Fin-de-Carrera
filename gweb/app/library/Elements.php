<?php

use Phalcon\Mvc\User\Component;

/**
 * Elements
 *
 * Helps to build UI elements for the application
 */
class Elements extends Component
{
	private $_menuCabeceraPublica = array('navbar-nav' => array('index' => array('caption' => 'Home',
																			'action' => 'index'),/*
															'about' => array('caption' => 'About',
																			'action' => 'index'),*/
															'blog' => array('caption' => 'Blog',
																			'action' => 'index'),
															'contact' => array('caption' => 'Contact',
																				'action' => 'index'),
															'usuario' => array('caption' => 'Log In/Sign Up',
																				'action' => 'login'),
														)
								);

	private $_menuCabeceraPrivado = array('navbar-nav' => array('index' => array('caption' => 'Home',
																			'action' => 'index'),
															'about' => array('caption' => 'About',
																			'action' => 'index'),
															'blog' => array('caption' => 'Blog',
																			'action' => 'index'),
															'contact' => array('caption' => 'Contact',
																				'action' => 'index'),
															'usuario' => array('caption' => 'Log In/Sign Up',
																				'action' => 'end'),
														)
								);


	/**
     * Builds header menu with left and right items
     *
     * @return string
     */
    public function getMenu()
    {

        $auth = $this->session->get('auth');
        if ($auth) {
            $this->_menuCabeceraPrivado['navbar-nav']['usuario'] = array(
                //'caption' => 'Log Out',
                'caption' => 'Log Out (' . $auth['name'] . ')',
                //'caption' => $auth->name,
                'action' => 'end'
            );
            $_menu = $this->_menuCabeceraPrivado;
            $_chek = 0;
        } else {
            //unset($this->_menuCabecera['navbar-nav']['about']);
            $_menu = $this->_menuCabeceraPublica;
            $_chek = 1;
        }

        $controllerName = $this->view->getControllerName();
        //foreach ($this->_menuCabecera as $position => $menu) {
        foreach ($_menu as $position => $menu) {
            echo '<div class="nav-collapse">';
            echo '<ul class="nav navbar-nav ', $position, '">';
            foreach ($menu as $controller => $option) {
                if ($controllerName == $controller) {
                    echo '<li class="active">';
                } else {
                    echo '<li>';
                }
                //echo $this->tag->linkTo($controller . '/' . $option['action'], $option['caption']);

if($controller == 'usuario' AND $_chek == 1)
{
echo $this->tag->form($controller . '/' . $option['action']);
?>
<table width="50" height="100"><tr><td><table><tr><td>
Nombre:
</td><td>
<?php
echo $this->tag->textField(array("nombre", "size" => 10));
?>
</td></tr><tr><td>
Password:
</td><td>
<?php
echo $this->tag->passwordField(array("password", "size" => 10));
?>
</td></tr></table></td><td align="center">
<?php
echo $this->tag->submitButton(array($option['caption']));
?>
</td></tr></table>
<?php
echo $this->tag->endForm();
}
else
    {echo $this->tag->linkTo($controller . '/' . $option['action'], $option['caption']);}

                echo '</li>';
            }
            echo '</ul>';
            echo '</div>';
        }

    }
}