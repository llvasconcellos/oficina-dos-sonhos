<?php
// +----------------------------------------------------------------------+
// | PHP Version 5                                                        |
// +----------------------------------------------------------------------+
// | Copyright (c) 1997-2005 The PHP Group                                |
// +----------------------------------------------------------------------+
// | This source file is subject to version 3.0 of the PHP license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available at through the world-wide-web at                           |
// | http://www.php.net/license/3_0.txt.                                 |
// | If you did not receive a copy of the PHP license and are unable to   |
// | obtain it through the world-wide-web, please send a note to          |
// | license@php.net so we can mail you a copy immediately.               |
// +----------------------------------------------------------------------+
// | Author: Marco Graetsch <magdev@pear-forum.de                         |
// +----------------------------------------------------------------------+
//
// $Id: pdf.class.php,v 1.2 2005/10/07 13:50:49 mikedeboer Exp $
//

define('FILE_FDF_FDFVERSION','1.2');

/**
* Class for generating and parsing Adobe-FDF-Files
*
* This class will parse and produce valid Adobe FDF-Files without need
* for the native PHP extension.
*
* Example 1: Generate new FDF
*
* <code>
* $file="i:/eclipse/File_FDF/test.pdf";
* $data=array('Name'=>'Admin','eMail'=>'admin@your_domain.com');
* $fdf=&new File_FDF($file);
* $fdf->create($data);
* $filename=$fdf->save('test');
* </code>
* Example 2: Parse existing FDF
* <code>
* print_r(File_FDF::parse($filename));
* </code>
*
* @package File_FDF
* @author Marco Graetsch <magdev@pear-forum.de>
* @version 0.1.0dev1
* @example example.php
* @category File Formats
* @final
*/
class PDF_parser
{
    var $_file = '';
    var $_data = '';
    var $_pdf = '';
    
    /**
     * Constructor
     *
     * @param string $pdf PDF-Filename
     */
    function PDF_parser($pdf = NULL)
    {
        if(!is_null($pdf)) {
            $this->setPDF($pdf);
        }
    }
    
    /**
     * Destructor
     */
    function __destruct()
    {
        $this->_data = '';
        $this->_pdf = NULL;
    }
    
    /**
     * Create new FDF-File
     *
     * @access public
     * @param array $values Assoziative Array with values
     * @return boolean always true
     */
    function create($values)
    {
        $this->_fdfId = mt_rand(100000,999999).mt_rand(100000,999999);
        $this->_data = "%FDF-" . FILE_FDF_FDFVERSION . "\n%‚„œ”\n1 0 obj\n<< \n/FDF << /Fields [ ";
        $this->_addValues($values);
        $this->_data .= "] \n/F (" . $this->_pdf . ") /ID [ <" . $this->_fdfId . ">\n] >>" .
            " \n>> \nendobj\ntrailer\n" .
            "<<\n/Root 1 0 R \n\n>>\n%%EOF\n";
        return true;
    }
    
    /**
     * Set name of the related PDF-File
     *
     * @param string $pdf PDF-Filename
     * @return mixed true on succes or PEAR_Error
     * @access public
     */
    function setPDF($pdf)
    {
        if(is_file($pdf)) {
            $this->_pdf = $pdf;
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Send FDF to Browser
     *
     * If Adobe Reader is correctly installed, the related PDF-File
     * should be opened an the generated FDF-Data should load into.
     * @access public
     */
    function send()
    {
        header("Content-Type: application/vnd.fdf");
        echo $this->_data;
        exit();
    }
    
    /**
     * Save FDF-File
     *
     * @param string $filename Filename without extension
     * @return string FDF-Filename
     * @access public
     */
    function save($filename=NULL,$fullpath=false)
    {
        $file=$this->_generateFilename($filename);
        file_put_contents($file,$this->_data);
        return $fullpath==true ? realpath($file) : $file;
        exit();  // <-- Without this exit() Adobe Reader produces an error. (??)
    }
    
    /**
     * Parse existing FDF-File (or string)
     *
     * @param string $file Filename or FDF-String
     * @return array Assoziative array with parsed data
     * @static
     */
    function parse($file)
    {
        $fdf=is_file($file) ? $fdf=file_get_contents($file) : $file;
        $regex1="∞%FDF-([\d\.]+)[\n\w\W\d]+/Fields \[(.*?) \][\n\s]+/F \((.*?)\)[\s]+/ID \[ \<([\w\d]+)∞mi";
        $regex2="∞<< /T \((.*?)\)[\W]+/V \((.*?)\) >>∞i";
        $data=preg_match($regex1,$fdf,$parts);
        $ret['fdf_version'] = $parts[1];
        $ret['pdf_file'] = $parts[3];
        $ret['ID'] = $parts[4];
        $tmp=preg_match_all($regex2,$parts[2],$values,PREG_PATTERN_ORDER);
        foreach($values[1] as $i=>$key) {
            $ret['data'][$key] = $values[2][$i];
        }
        return $ret;
    }
    
    /**
     * Add values to FDF-String
     *
     * @access private
     * @param array $values assoziative array with values
     * @return mixed true on success or PEAR_Error
     */
    function _addValues($values)
    {
        if(is_array($values)) {
            foreach($values as $field=>$value) {
                $this->_data.="<< /T (".$field.") /V (".$value.") >> ";
            }
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Generate unique Filename
     *
     * @param string $file Name of FDF-File without extension
     * @return string unique FDF-Filename
     */
    function _generateFilename($file)
    {
        return (is_null($file) ? $this->_fdfId : $file.'-'.$this->_fdfId).'.fdf';
    }
}


?> 