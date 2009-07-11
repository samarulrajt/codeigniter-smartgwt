<?php

/**

 * @property

 **/


function autoLoadModel() {
	$classesDirectory = 'model/';
	$classesExtension = '.php';
	// require_once all classes in that directory
	$d = dir($classesDirectory);
	while (false !== ($entry = $d->read())) {
		// Check extension
		if (substr($entry, -(strlen($classesExtension))) == $classesExtension) {
			require_once($classesDirectory.$entry);
            //print_r($entry);
		}
	}
	$d->close();
	// print_r(get_declared_classes());;
}
autoLoadModel();

$objA = new classABC();
$objA->setA(1323232);
$objA->setB('attribute B');
$objA->setC(1.02);

print_r($objA->testMe());

//echo get_class($objA);

$refl = new ReflectionClass('classABC');
$methods = $refl->getMethods();
$properties = $refl->getProperties();

$property_values = array();
foreach ($properties as $property) {
	try {
		$getter = $refl->getMethod('get'.strtoupper($property->getName()));
		$property_values[$property->getName()] = $getter->invoke($objA);
	} catch (ReflectionException $e) {
		echo $e->getTraceAsString();
		//log this
	}
}
echo json_encode($property_values);



$arr2 = json_decode('{"a":1.5,"b":"attribute B2","c":1.7754}');
$abc2 = new classABC();
foreach ($arr2 as $property => $value) {
	print($property . ' = ' . $value . '<br />');
    $setter = $refl->getMethod('set'.strtoupper($property));
    $setter->invoke($abc2,$value);
}
$abc2->setA($abc2->getA()*2);
print('$abc2->getA() = ' . $abc2->getA() . '<br />');
print('$abc2->getB() = ' . $abc2->getB() . '<br />');
print('$abc2->getC() = ' . $abc2->getC() . '<br />');



$zzz = $refl->getMethod('getZZZ');
$args2 = array();
$args2[0] = "Trieu";
$args2[1] = "Nguyen";
print('$zzz->invoke($abc2) = ' . $zzz->invokeArgs($abc2,$args2) . '<br />');
?>
