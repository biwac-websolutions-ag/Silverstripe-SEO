<?php

namespace PlasticStudio\SEO\Model\Extension;

use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Core\Config\Config;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\HeaderField;
use SilverStripe\Forms\LiteralField;
use SilverStripe\Forms\TextField;
use SilverStripe\Core\Extension;

/**
 * SeoSiteConfigExtension
 *
 * Updates the CMS site config with custom fields for SEO and Social sharing
 *
 * @package silverstripe-seo
 **/
class SeoSiteConfigExtension extends Extension
{
    /**
     * Array of extra CMS settings fields
     *
     * @since version 1.0.6
     *
     * @config array $db
     **/
    private static $db = [
        'UseTitleAsMetaTitle'    => 'Boolean',
    ];

    /**
     * Defines the default values for the fields
     *
     * @var bool[]
     */
    private static $defaults = [
        'UseTitleAsMetaTitle' => true // Use the page title as the meta title by default
    ];

    /**
     * Adds extra fields for social config across networks
     *
     * @since version 1.0.6
     *
     * @param FieldList $fields The current FieldList object
     *
     * @return FieldList
     **/
    public function updateCMSFields(FieldList $fields)
    {
        $fields->addFieldToTab('Root.SEO', HeaderField::create(false, 'Meta'));
        $fields->addFieldToTab('Root.SEO', CheckboxField::create('UseTitleAsMetaTitle', _t(__CLASS__ . '.USETITLEASMETATITLE', 'Default Meta title to page title when Meta title empty?')));

        return $fields;
    }
}
