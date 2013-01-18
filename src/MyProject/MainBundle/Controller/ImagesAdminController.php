<?php
namespace MyProject\MainBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ImagesAdminController extends Controller
{
     /**
     * redirect the user depend on this choice
     *
     * @param object $object
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function redirectTo($object)
    {
        $url = false;

        if ($this->get('request')->get('btn_update_and_list')) {
            $url = $this->admin->generateUrl('list');
        }

        if ($this->get('request')->get('btn_create_and_create')) {
            $url = $this->admin->generateUrl('create');
        }

        if (!$url) {
            $url = $this->admin->generateUrl('list');
        }

        return new RedirectResponse($url);
    }
     public function editAction($id = null)
    {                 
       $this->get('session')->setFlash('sonata_flash_success','flash_create_success');
                // redirect to edit mode
                return $this->redirectTo();
    }
}