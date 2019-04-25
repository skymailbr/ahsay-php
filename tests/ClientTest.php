<?php

namespace Ahsay\Test;

class ClientTest extends AbstractTestCase
{
    public function testRequestWithVersionOnEndpoint()
    {
        $fn = $this->getFunctionMock('Ahsay', 'curl_exec');
        $fn->expects($this->once())->willReturn(true);

        $result = $this->getClient()->request('endpoint', [], '2');

        $this->assertIsArray($result);
    }

    public function testRequestThrowingExceptionOnJsonEncodeError()
    {
        $fn1 = $this->getFunctionMock('Ahsay', 'json_last_error');
        $fn1->expects(($this->exactly(2)))->willReturn(1);

        $fn2 = $this->getFunctionMock('Ahsay', 'json_last_error_msg');
        $fn2->expects($this->once())->willReturn('Some error from json_encode');

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Some error from json_encode');

        $this->getClient()->request('endpoint');
    }

    public function testRequestThrowingExceptionOnJsonEncodeReturnsFalse()
    {
        $fn = $this->getFunctionMock('Ahsay', 'json_encode');
        $fn->expects($this->once())->willReturn(false);

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Could not create request body');

        $this->getClient()->request('endpoint');
    }

    public function testRequestThrowingExceptionOnCurlInitError()
    {
        $fn = $this->getFunctionMock('Ahsay', 'curl_init');
        $fn->expects($this->once())->willReturn(false);

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Could not create Curl resource');

        $this->getClient()->request('endpoint');
    }

    public function testRequestThrowingExceptionOnCurlExecReturnsFalse()
    {
        $fn = $this->getFunctionMock('Ahsay', 'curl_exec');
        $fn->expects($this->once())->willReturn(false);

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Invalid response from resource server');

        $this->getClient()->request('endpoint');
    }

    public function testRequestThrowingExceptionOnCurlExecReturnsTrue()
    {
        $fn = $this->getFunctionMock('Ahsay', 'curl_exec');
        $fn->expects($this->once())->willReturn(true);

        $this->assertEquals([], $this->getClient()->request('endpoint'));
    }

    public function testRequestThrowingExceptionOnCurlErrnoReturnsError()
    {
        $fn1 = $this->getFunctionMock('Ahsay', 'curl_errno');
        $fn1->expects(($this->exactly(2)))->withAnyParameters()->willReturn(1);

        $fn2 = $this->getFunctionMock('Ahsay', 'curl_error');
        $fn2->expects($this->once())->willReturn('Some error from curl');

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Some error from curl');

        $this->getClient()->request('endpoint');
    }

    public function testRequestThrowingExceptionOnJsonDecodeError()
    {
        $fn1 = $this->getFunctionMock('Ahsay', 'curl_exec');
        $fn1->expects($this->once())->willReturn('{aaaaaaa');

        $fn2 = $this->getFunctionMock('Ahsay', 'json_last_error');
        $fn2->expects($this->at(0))->willReturn(0);
        $fn2->expects(($this->at(1)))->willReturn(1);

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Syntax error');

        $this->getClient()->request('endpoint');
    }

    public function testRequestThrowingExceptionOnResponseError()
    {
        $error = [
            'Status' => 'Error',
            'Message' => '[UserCacheManager.NoSuchUserExpt] User \'aaaa\' not found.',
            'ExptType' => 'com.ahsay.obs.core.dbs.ad'
        ];

        $fn1 = $this->getFunctionMock('Ahsay', 'curl_exec');
        $fn1->expects($this->once())->willReturn(json_encode($error));

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('[UserCacheManager.NoSuchUserExpt] User \'aaaa\' not found.');

        $this->getClient()->request('endpoint');
    }

    public function testRequestWithSuccessWillReturnData()
    {
        $fn1 = $this->getFunctionMock('Ahsay', 'curl_exec');
        $fn1->expects($this->once())->willReturn('{"Status":"OK","Data":{"Key":"Value"}}');

        $result = $this->getClient()->request('endpoint');
        $this->assertEquals(['Status' => 'OK', 'Data' => ['Key' => 'Value']], $result);
    }

    public function testRequestWithSuccessWithNoDataKeyWillReturnItself()
    {
        $fn1 = $this->getFunctionMock('Ahsay', 'curl_exec');
        $fn1->expects($this->once())->willReturn('{"Key":"Value"}');

        $result = $this->getClient()->request('endpoint');
        $this->assertEquals(['Key' => 'Value'], $result);
    }
}
