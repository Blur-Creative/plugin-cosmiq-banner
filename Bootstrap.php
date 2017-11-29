<?php
/**
 * BlurCreative Cosmiq Banner - Shopping Worlds extention
 * @copyright Copyright (c) BlurCreative (http://blurcreative.de/)
 */

use Shopware\Components\Theme\LessDefinition;
use Doctrine\Common\Collections\ArrayCollection;
 
class Shopware_Plugins_Backend_BlurCosmiqBanner_Bootstrap extends Shopware_Components_Plugin_Bootstrap
{
    /*
     * readable plugin name
    */
    public function getLabel()
    {
        return 'Cosmiq Banner';
    }
    
    /*
     * plugin version
    */
    public function getVersion()
    {
        return "0.0.1";
    }
	
    /**
     * Returns a Meta Infos
     */
    public function getInfo() {
        include 'meta.php';
        return $meta;
    }
    
    // Set the new secureUninstall capability
    public function getCapabilities()
    {
        return array(
            'install' => true,
            'enable' => true,
            'update' => true,
            'secureUninstall' => true
        );
    }
    
    /*
     * here comes the install routine
    */
    public function install()
    {

        $cosmiqBannerElement = $this->createEmotionComponent([
            'name' => 'Cosmiq Banner',
            'xtype' => 'emotion-components-cosmiqbanner',
            'template' => 'emotion_cosmiq_banner',
            'cls' => 'emotion-cosmiq-banner-element',
            'description' => 'A simple responsive banner element for the shopping worlds.'
        ]);
        
        //banner title
        $cosmiqBannerElement->createTextField([
            'name' => 'cosmiq_banner_title',
            'fieldLabel' => 'Title',
            'supportText' => 'Set a title for the banner element',
            'allowBlank' => true
        ]);    
        
        //banner description
        $cosmiqBannerElement->createTinyMceField([
            'name' => 'cosmiq_banner_description',
            'fieldLabel' => 'Description',
            'supportText' => 'Set a description for the banner element',
            'allowBlank' => true
        ]);
        
        //banner button title
        $cosmiqBannerElement->createTextField([
            'name' => 'cosmiq_banner_button_title',
            'fieldLabel' => 'Button Title',
            'supportText' => 'Set a button for the banner element',
            'allowBlank' => true
        ]);
        
        //banner button link
        $cosmiqBannerElement->createTextField([
            'name' => 'cosmiq_banner_button_link',
            'defaultValue' => 'banner_button_link',
            'fieldLabel' => 'Button Link',
            'supportText' => 'Set a button link for the banner element',
            'allowBlank' => true
        ]);
        
        //banner textfield orientation - top left
        $cosmiqBannerElement->createRadioField([
            'name' => 'cosmiq_banner_textfield_orientation',
            'fieldLabel' => 'Textfield Position',
            'defaultValue' => 'top-left',
            'allowBlank' => true
        ]);
        
        //banner textfield orientation - top center
        $cosmiqBannerElement->createRadioField([
            'name' => 'cosmiq_banner_textfield_orientation',
            'defaultValue' => 'top-center',
            'allowBlank' => true
        ]);
        
        //banner textfield orientation - top right
        $cosmiqBannerElement->createRadioField([
            'name' => 'cosmiq_banner_textfield_orientation',
            'defaultValue' => 'top-right',
            'allowBlank' => true
        ]);
        
        //banner textfield orientation - center left
        $cosmiqBannerElement->createRadioField([
            'name' => 'cosmiq_banner_textfield_orientation',
            'defaultValue' => 'center-left',
            'allowBlank' => true
        ]);
        
        //banner textfield orientation - center center
        $cosmiqBannerElement->createRadioField([
            'name' => 'cosmiq_banner_textfield_orientation',
            'defaultValue' => 'center-center',
            'allowBlank' => true
        ]);
        
        //banner textfield orientation - center right
        $cosmiqBannerElement->createRadioField([
            'name' => 'cosmiq_banner_textfield_orientation',
            'defaultValue' => 'center-right',
            'allowBlank' => true
        ]);
        
        //banner textfield orientation - bottom left
        $cosmiqBannerElement->createRadioField([
            'name' => 'cosmiq_banner_textfield_orientation',
            'defaultValue' => 'bottom-left',
            'allowBlank' => true
        ]);
        
        //banner textfield orientation - bottom center
        $cosmiqBannerElement->createRadioField([
            'name' => 'cosmiq_banner_textfield_orientation',
            'defaultValue' => 'bottom-center',
            'allowBlank' => true
        ]);
        
        //banner textfield orientation - bottom right
        $cosmiqBannerElement->createRadioField([
            'name' => 'cosmiq_banner_textfield_orientation',
            'defaultValue' => 'bottom-right',
            'allowBlank' => true
        ]);
        
        //banner full sized
        $cosmiqBannerElement->createCheckboxField([
            'name' => 'cosmiq_banner_full_sized_content',
            'fieldLabel' => 'Full Sized Content',
            'helpText' => 'If this option is set the content of the banner will be full sized. Otherwise the content is boxed with a max size of 1260px (less variable can be changed)',
            'allowBlank' => true
        ]);
        
        //banner background image
        $cosmiqBannerElement->createMediaField([
            'name' => 'cosmiq_banner_background_image',
            'fieldLabel' => 'Background Image',
            'supportText' => 'Set a background image for the banner element',
            'allowBlank' => true
        ]);        
        
        /**
         * Subscribe to the post dispatch event of the emotion backend module to extend the components.
         */
        $this->subscribeEvent(
            'Enlight_Controller_Action_PostDispatchSecure_Backend_Emotion',
            'onPostDispatchBackendEmotion'
        );
        
        //subscribe event: add the less file
        $this->subscribeEvent(
            'Theme_Compiler_Collect_Plugin_Less',
            'addLessFiles'
        );

        $this->subscribeEvent(
            'Shopware_Controllers_Widgets_Emotion_AddElement',
            'onEmotionAddElement'
        );
        
        return true;
    }
    
    /**
     * Extends the backend template to add the grid component for the emotion designer.
     *
     * @param Enlight_Controller_ActionEventArgs $args
     */
    public function onPostDispatchBackendEmotion(Enlight_Controller_ActionEventArgs $args)
    {
        /** @var \Shopware_Controllers_Backend_Emotion $controller */
        $controller = $args->getSubject();
        $view = $controller->View();

        $view->addTemplateDir($this->Path() . 'Views/');
        $view->extendsTemplate('backend/emotion/blur_cosmiq_banner/view/detail/elements/cosmiq_banner.js');
    }
    
    // function: add the less file
    public function addLessFiles(Enlight_Event_EventArgs $args) {
      $less = new \Shopware\Components\Theme\LessDefinition( 
        array(),
        array( __DIR__ . '/Views/frontend/_public/src/less/all.less' ),
        __DIR__
      );
      return new Doctrine\Common\Collections\ArrayCollection(array($less));
    }
    
    public function onEmotionAddElement(Enlight_Event_EventArgs $args)
    {
        $element = $args->get('element');
    
        if ($element['component']['xType'] !== 'emotion-components-cosmiqbanner') {
            return;
        }
    
        $data = $args->getReturn();
        
        // Do some stuff with the element data
        
        $args->setReturn($data);
    }
    
    public function uninstall()
    {
        $this->secureUninstall();
        return true;
    }

    public function enable()
    {
        return [
            'success' => true,
            'invalidateCache' => ['backend', 'frontend', 'theme']
        ];
    }

    public function disable()
    {
        return [
            'success' => true,
            'invalidateCache' => ['backend', 'frontend', 'theme']
        ];
    }
}


 
?>