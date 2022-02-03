<?php
/*
    Algorithm 
    1. splice array, get nodes, convert paths to array
    2. iterate nodes, start from 0, set $i $node 
    3. iterate paths, start from end, search path for $node
    4. if found, push partner node to $collection
    5. compare nodes in $collection, get the max node 
    6. if partner node is the $end node, break the iteration and return
    7. else, use partner node index in the nodes iteration (2)
    8. go back to (3)
*/

function shortestPath($strArr)
{
    $nodes = array_slice($strArr, 1, $strArr[0]);
    $path = array_slice($strArr, $strArr[0]+1, count($strArr));
    
    return iterateNode($nodes, $path);
}

function iterateNode($nodes, $path)
{
    $builder = current($nodes) . "-";
    for ($i=0; $i<=count($nodes); $i++) 
    {
        $max = iteratePath($nodes, $nodes[$i], $path);
        $builder .= $max['node'] . "-";
        $i = $max['index']-1;
        if ($max['node'] == end($nodes)) 
        {
            $builder = substr_replace($builder, "", -1);
            break;
        }
    }
    return $builder;
}

function iteratePath($nodes, $node, $path)
{
    $nodes = array_flip($nodes);
    $collection = array();
    for ($i=count($path)-1; $i>=0; $i--) 
    {
        $currentPath = $path[$i];
        $fruit = explode("-", $currentPath);
        if (in_array($node, $fruit))
        {
            if (count($fruit) > 1 && $fruit[0] == $node)
            {
                $next_node = $fruit[1];
                $collection[$fruit[1]] = $nodes[$fruit[1]];
            }
            else
            {
                $next_node = $fruit[0];
                $collection[$fruit[0]] = $nodes[$fruit[0]];
            }
        }
    }
    $max_index = max($collection);
    $max_node = array_search(max($collection), $collection);
    return array('index' => $max_index, 'node' => $max_node);
}