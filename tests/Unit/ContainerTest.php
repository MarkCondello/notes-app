<?php

test('it can resolve something out of the container', function () {
  // arrange
  $container = new \Core\Container();
  $container->bind('foo', function () {
    return 'bar';
  });
  
  $result = $container->resolve('foo');

  expect($result)->toEqual('bar');
});