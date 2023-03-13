<?php
/**
 * This php file is designed to manage all operation regarding snow's management
 * Author   : pascal.benzonana@cpnv.ch
 * Project  : 151
 * Created  : 18.02.2019 - 21:40
 *
 * Last update :    19.02.2019 PBA
 *                  update fields in query
 * Source       :   https://bitbucket.org/pba_cpnv/151-2019_pba
 */

require_once 'model/dbConnector.php';
const SEPARATOR = '\'';

/**
 * This function is designed to get all active snows
 * @return array : containing all information about snows. Array can be empty.
 */
function getSnows(){
    $snowsQuery = 'SELECT code, brand, model, snowLength, dailyPrice, qtyAvailable, photo, active FROM snows';
    return executeQuerySelect($snowsQuery);
}

function getSnow($code)
{
    $snowQuery = 'SELECT code, brand, model, snowLength, dailyPrice, qtyAvailable, description, photo FROM snows WHERE code='.SEPARATOR.$code.SEPARATOR.'AND active=1';
    return executeQuerySelect($snowQuery);
}