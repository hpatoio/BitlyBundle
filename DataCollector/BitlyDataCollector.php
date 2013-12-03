<?php

/*
 * This file was taken from Symfony2 GuzzleBundle and modified.
 *
 * (c) University of Cambridge
 * (c) Simone Fumagalli | simone@iliveinperego.com
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hpatoio\BitlyBundle\DataCollector;

use Guzzle\Log\ArrayLogAdapter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\DataCollector\DataCollector;

class BitlyDataCollector extends DataCollector
{
    protected $logAdapter;

    public function __construct(ArrayLogAdapter $logAdapter)
    {
        $this->logAdapter = $logAdapter;
    }

    public function collect(Request $request, Response $response, \Exception $exception = null)
    {
        
        foreach ($this->logAdapter->getLogs() as $log) {
            $datum['message'] = $log['message'];
            $datum['request'] = (string) $log['extras']['request'];
            $datum['response'] = (string) $log['extras']['response'];
            $datum['is_error'] = $log['extras']['response']->isError();

            $this->data['requests'][] = $datum;
        }
    }

    public function getRequests()
    {
        return $this->data['requests'];
    }

    public function getName()
    {
        return 'hpatoio_bitly_bundle';
    }
}
