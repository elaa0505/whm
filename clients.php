
<?php
// Pull in the NuSOAP code
require_once('nusoap.php');
echo "dev1";
// Create the client instance
$client = new nusoap_client('http://localhost/xml-webservice/server.php');
echo "dev2";
// Check for an error
$err = $client->getError();
echo "dev3";
if ($err) {
    // Display the error
    echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
echo "dev4";
    // At this point, you know the call that follows will fail
}
// Call the SOAP method
$result = $client->call('hello', array('name' => 'Scott'));
echo $result ;
echo "dev5";
// Check for a fault
if ($client->fault) {
    echo '<h2>Fault</h2><pre>';
    print_r($result);
    echo '</pre>';
echo "dev6";
} else {
    // Check for errors
    $err = $client->getError();
    if ($err) {
        // Display the error
        echo '<h2>Error</h2><pre>' . $err . '</pre>';
echo "dev7";
    } else {
        // Display the result
        echo '<h2>Result</h2><pre>';
        print_r($result);
    echo '</pre>';
echo "dev7";
    }
}
?>
<?php
// Display the request and response
echo '<h2>Request</h2>';
echo '<pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2>';
echo '<pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
?>
