# Emitting HTTP Requests Traditionally
COMP4711 - BCIT - Winter 2019

Here are some examples of different ways to emit HTTP requests

Without additional support, we are stuck with an HTTP GET

    $result = file_get_contents($url);

Although we *could* do an HTTP POST awkwardly

    function do_post_request($url, $data, $optional_headers = null)
    {
      $params = array('http' => array(
                  'method' => 'POST',
                  'content' => $data
                ));
      if ($optional_headers !== null) {
        $params['http']['header'] = $optional_headers;
      }
      $ctx = stream_context_create($params);
      $fp = @fopen($url, 'rb', false, $ctx);
      if (!$fp) {
        throw new Exception("Problem with $url, $php_errormsg");
      }
      $response = @stream_get_contents($fp);
      if ($response === false) {
        throw new Exception("Problem reading data from $url, $php_errormsg");
      }
      return $response;
    }

## cURL (old school)

The built-in [cURL library](http://php.net/manual/en/book.curl.php) has been around forever, evident in its clunky
interface.

An HTTP GET can now be done awkwardky

    $url = 'http://localhost:8080/stocks';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    curl_close($ch);
    echo $data;

But we can emit an HTTP POST too

    # some data, from a form perhaps
    $id = $_POST['id'];
    $symbol = $_POST['symbol'];
    $companyName = $_POST['companyName'];

    # data needs to be POSTed to the service
    $data = array("id" => "$id", "symbol" => "$symbol", "companyName" => "$companyName");
    $data_string = json_encode($data);

    $ch = curl_init('http://localhost:8080/stocks/add');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data_string))
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

    //execute post
    $result = curl_exec($ch);

    //close connection
    curl_close($ch);

    echo $result;

Things could go wrong, in which case we need to deal with the error...

    if($result === false)
	{
		echo "Error Number:".curl_errno($ch)."<br>";
		echo "Error String:".curl_error($ch);
	}

## Guzzle (the usual)

[Guzzle](http://docs.guzzlephp.org/en/stable/) is a popular
"package" to simplify HTTP request emission.

An HTTP GET...

    $client = new GuzzleHttp\Client();
    $result = $client->request('GET', 'https://api.github.com/user', [
        'auth' => ['user', 'pass']
    ]);

You get an object back, with appropriate properties

    echo $result->getStatusCode();      // "200"
    echo $result->getHeader('content-type');        // 'application/json; charset=utf8'
    echo $result->getBody();    // {"type":"User"...'

You can also make HTTP requests directly ...

    $client = new GuzzleHttp\Client();
    $response = $client->get('http://httpbin.org/get');
    $response = $client->delete('http://httpbin.org/delete');
    $response = $client->head('http://httpbin.org/get');
    $response = $client->options('http://httpbin.org/get');
    $response = $client->patch('http://httpbin.org/patch');
    $response = $client->post('http://httpbin.org/post');
    $response = $client->put('http://httpbin.org/put');

or

    $client = new GuzzleHttp\Client(['base_uri' => 'https://foo.com/api/']);
    $request = new Request('PUT', 'http://httpbin.org/put');
    $response = $client->send($request, ['timeout' => 2]);

## UniRest (the new kid)

[UniRest](http://unirest.io/php.html) is another similar package.

It seems to use static methods...

    $headers = array('Accept' => 'application/json');
    $query = array('foo' => 'hello', 'bar' => 'world');

    $response = Unirest\Request::post('http://mockbin.com/request', $headers, $query);

    $response->code;        // HTTP Status code
    $response->headers;     // Headers
    $response->body;        // Parsed body
    $response->raw_body;    // Unparsed body

