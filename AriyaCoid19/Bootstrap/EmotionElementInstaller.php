<?php

namespace AriyaCoid19\Bootstrap;

use Shopware\Components\Emotion\ComponentInstaller;

class EmotionElementInstaller
{
    /** $emotionElementInstaller = new EmotionElementInstaller(
     * $this->getName(),
     * $this->container->get('shopware.emotion_component_installer')
     * );
     * @var ComponentInstaller
     */
    private $emotionComponentInstaller;

    /**
     * @var string
     */
    private $pluginName;

    /**
     * @param string             $pluginName
     * @param ComponentInstaller $emotionComponentInstaller
     */
    public function __construct($pluginName, ComponentInstaller $emotionComponentInstaller)
    {
        $this->emotionComponentInstaller = $emotionComponentInstaller;
        $this->pluginName = $pluginName;
    }

    public function install()
    {
        $ariyaCoid19 = $this->emotionComponentInstaller->createOrUpdate(
            $this->pluginName,
            'AriyaCoid19',
            [
                'name' => 'Ariya Coid19',
                'template' => 'emotion_coid19',
                'xtype' => 'emotion-components-ariya-coid19',
                'cls' => 'emotion-coid19',
                'description' => 'Show statics of coid-19 in your shop , Do NOT forget to wash your hand!'
            ]
        );

        $ariyaCoid19->createTextField([
            'name' => 'allCaseApi',
            'fieldLabel' => 'Api address for all cases statics',
            'allowBlank' => false,
            'defaultValue' => 'https://corona.lmao.ninja/all'
        ]);

        $ariyaCoid19->createTextField([
            'name' => 'countriesApi',
            'fieldLabel' => 'Api address for countries statics',
            'allowBlank' => false,
            'defaultValue' => 'https://corona.lmao.ninja/countries'
        ]);



    }
}