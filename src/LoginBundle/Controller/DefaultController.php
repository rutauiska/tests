<?php

namespace LoginBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use LoginBundle\Entity\Users;
use LoginBundle\Modals\Login;
use LoginBundle\Entity\Investments;
use LoginBundle\Entity\Loads;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
    	$session = $this->getRequest()->getSession();
    	$em = $this->getDoctrine()->getEntityManager();
	    $repository = $em->getRepository('LoginBundle:Users');

    	if($request->getMethod() == 'POST') {
    		$session->clear();
    		$username = $request->get('username');
    		$password = $request->get('password');
    		
	    	$user = $repository->findOneBy(array('email' => $username, 'password' => $password ));
	    	if ($user) {
	    		$login = new Login();
	    		$login->setUsername($username);
	    		$login->setPassword($password);
	    		$session->set('login', $login);
	    		return $this->showProfile($user);
		    } else {
				return $this->render('LoginBundle:Default:login.html.twig', array('error' => 'Nepareiz lietotajs vards vai parole'));
		    }

    	} else {
    		$user = $this->checkLoginAction();
	    	if ($user) {
	    		return	$this->showProfile($user);
	    	}

			return $this->render('LoginBundle:Default:login.html.twig');
    		
		}

    	
    }


    public function logoutAction(Request $request)
    {
    	$session = $this->getRequest()->getSession();
    	$session->clear();
    	return $this->render('LoginBundle:Default:login.html.twig');
    }

    private function checkLoginAction()
    {
    	$em = $this->getDoctrine()->getEntityManager();
    	$repository = $em->getRepository('LoginBundle:Users');
    	$session = $this->getRequest()->getSession();
    	if($session->has('login')){
			$login =$session->get('login');
			$username = $login->getUsername();
			$password = $login->getPassword();
			$user = $repository->findOneBy(array('email' => $username, 'password' => $password ));
    		if ($user) {
    			return	$user;
    		}
		}
		return false;

    }

    public function showProfile(Users $user, $error = '') {
		$em = $this->getDoctrine()->getEntityManager(); 

		$loads = $em->getRepository('LoginBundle:Loads')->findAll(); 
		$investments = $em->getRepository('LoginBundle:Investments')->findBy( array('userId' => $user->getId())); 

		return $this->render(
			'LoginBundle:Default:profile.html.twig', 
			array('name' => $user->getName(), 
				'loads' => $loads,
				'investments' => $investments,
				'error' => $error,
				'available' => $user->getAvailableforinvestments()));
    }

    public function investAction(Request $request)
    {
    	$em = $this->getDoctrine()->getEntityManager(); 
    	$user = $this->checkLoginAction();
	    if ($user) {
	
	    	if($request->getMethod() == 'POST') {
	    		$amount = $request->get('amount');
	    		$loand = $request->get('loand');
	    		$loand = (int)$loand;
	    		if (is_numeric ($amount)) {
					if ($amount <= $user->getAvailableforinvestments()) {
						$loads = $em->getRepository('LoginBundle:Loads')->findOneBy(array('id' => $loand));
						if ($amount <= $loads->getAvailableforinvestments() && $loads) {
							$investments = new Investments();
					        $investments->setLoandId( $loand);
					        $investments->setAmount( $amount);
					        $investments->setUserId( $user->getId());
					        $em->persist($investments);

					        $Availableforinvestments = $user->getAvailableforinvestments() - $amount;
					        $user->setAvailableforinvestments($Availableforinvestments);
	    					$em->persist($user);

							$Available = $loads->getAvailableforinvestments() - $amount;
							$loads->setAvailableforinvestments($Available);
							$em->persist($loads);

					        $em->flush();
					        return	$this->showProfile($user);
				        } else {
		    				$error = 'You cannot invest more that ' . $loads->getAvailableforinvestments();
		    				return	$this->showProfile($user, $error);
		    			}
	    			} else {
	    				$error = 'You cannot invest more that ' . $user->getAvailableforinvestments();
	    				return	$this->showProfile($user, $error);
	    			}
	    		} else {
	    			$error = 'Value not number';
	    			return	$this->showProfile($user, $error);
	    		}
	    		
	    	}
    	}
    }

}
