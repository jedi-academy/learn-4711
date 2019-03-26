# Emitting HTTP Requests with CodeIgniter4
COMP4711 - BCIT - Winter 2019

CodeIgniter4 has a lightweight HTTP client:
the [CURLRequest](https://codeigniter4.github.io/CodeIgniter4/libraries/curlrequest.html).

In a nutshell, you can use it to send HTTP messages using any of the HTTP verbs.

    use CodeIgniter\HTTP\CURLRequest;

    $client = new CURLRequest(
            new \Config\App(),
            new \CodeIgniter\HTTP\URI(),
            new \CodeIgniter\HTTP\Response(new \Config\App()),
            $options
    );

or 

    $client = \Config\Services::curlrequest();

## Then issue requests. Some examples ...

    $response = $client->request('GET', 'https://api.github.com/user', [
            'auth' => ['user', 'pass']
    ]);

    $client->get('photos');

    $client->delete('photos/13');

## Discover response information ...

    $code   = $response->getStatusCode();    // 200
    $reason = $response->getReason();      // OK
    $body = $response->getBody();

    if (strpos($response->getHeader('content-type'), 'application/json') !== false)
    {
            $body = json_decode($body);
    }

## There are some clever ways to modify your requests ...

    $client->setBody($body)
           ->request('put', 'http://example.com');

    $client->request('put', 'http://example.com', ['body' => $body]);

    $client->request('POST', '/post', [
            'form_params' => [
                    'foo' => 'bar',
                    'baz' => ['hi', 'there']
            ]
    ]);

    $client->request('get', '/', [
            'headers' => [
                    'User-Agent' => 'testing/1.0',
                    'Accept'     => 'application/json',
                    'X-Foo'      => ['Bar', 'Baz']
            ]
    ]);

    $response = $client->request('PUT', '/put', ['json' => ['foo' => 'bar']]);

## What do we need to worry about?

application/x-www-form-urlencoded

    field1=value1&amp;field2=value2&amp;field3=value3

multipart/form-data

    ---------------------------974767299852498929531610575
    text...

JSON (text/json) or (application/json)

    { "name":"Jim", "state":"confused" }    

XML (text/xml) or (application/xml)

    <response><name>Jim</name><state>confused</state?></response>

Unspecified - any of the above, or even

    name=Jim
    state=confused

