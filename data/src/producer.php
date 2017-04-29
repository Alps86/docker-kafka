<?php

echo 'start' . PHP_EOL;

$conf = new RdKafka\Conf();
$conf->set('group.id', 'GroupConsumerTest');
$conf->set('metadata.broker.list', '172.25.0.4:9092');
$conf->set('queue.buffering.max.messages', '10000000');

$rk = new RdKafka\Producer($conf);
#$rk->setLogLevel(LOG_DEBUG);

$topic = $rk->newTopic('test1');

for ($i = 0; $i < 1000000; $i++) {
    $topic->produce(0, 0, 'Message ' . $i);
    $rk->poll(0);
}

while ($rk->getOutQLen() > 0) {
    $rk->poll(50);
}

