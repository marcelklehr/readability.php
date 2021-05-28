<?php

namespace andreskrey\Readability\Test;

use andreskrey\Readability\Nodes\DOM\DOMDocument;

class TestPage
{
    private $configuration;
    private $sourceHTML;
    private $expectedHTML;
    private $expectedImages;
    private $expectedMetadata;

    public function __construct($configuration, $sourceHTML, $expectedHTML, $expectedImages, $expectedMetadata)
    {
        $this->configuration = $configuration;
        $this->sourceHTML = $sourceHTML;
        $this->expectedHTML = $expectedHTML;
        $this->expectedImages = $expectedImages;
        $this->expectedMetadata = $expectedMetadata;
    }

    /**
     * @return array
     */
    public function getConfiguration()
    {
        return $this->configuration;
    }

    /**
     * @return null
     */
    public function getSourceHTML()
    {
        return $this->sourceHTML;
    }

    /**
     * @return null
     */
    public function getExpectedHTML()
    {
        $dom = new DOMDocument('1.0', 'utf-8');
        $dom->substituteEntities = false;
        // Prepend the XML tag to avoid having issues with special characters. Should be harmless.
        $dom->loadHTML($this->expectedHTML);
        $dom->encoding = 'UTF-8';

        return $dom->getElementsByTagName('body')->item(0)->firstChild->C14N();
    }

    /**
     * @return mixed
     */
    public function getExpectedImages()
    {
        return $this->expectedImages;
    }

    /**
     * @return \stdClass
     */
    public function getExpectedMetadata()
    {
        return $this->expectedMetadata;
    }
}
