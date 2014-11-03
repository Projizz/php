<?php
function set_mission($param)
{
    global $bdd;
            
    $req = $bdd->prepare('INSERT INTO missions (id_utilisateur,titre,lieu,description) VALUES(?, ?, ?, ?)');
    $req->execute(array($param['id_utilisateur'],$param['titre'],$param['lieu'],$param['description']));
    
    return $bdd->lastInsertId();
}

function update_mission($param)
{
    global $bdd;
    
        
    $req = $bdd->prepare('UPDATE missions SET titre=:titre,lieu=:lieu,description=:description WHERE id=:id');
    $req->execute(array(
    	'titre' => $param['titre'], 
    	'lieu' => $param['lieu'], 
    	'description' => $param['description'],
    	'id' => $param['id']
    	));
    
    return $bdd->lastInsertId();
}

function get_mission($param)
{
    global $bdd;
    
    $limit = (int) 1;
        
    $req = $bdd->prepare('SELECT * FROM missions WHERE id=:id LIMIT :limit');
    $req->bindParam(':id', $param['id'], PDO::PARAM_INT);
    $req->bindParam(':limit', $limit, PDO::PARAM_INT);
    $req->execute();
    $mission = $req->fetch(); 
    
    return $mission;
}

function delete_mission($param)
{
    global $bdd;
        
    $req = $bdd->prepare('DELETE FROM missions WHERE id=:id');
    $req->bindParam(':id', $param['id'], PDO::PARAM_INT);
    $req->execute();
    $mission = $req->fetch(); 
    
    return $mission;
}

function get_missionsByUser($param,$offset, $limit)
{
    global $bdd;
    $offset = (int) $offset;
    $limit = (int) $limit;
        
    $req = $bdd->prepare('SELECT * FROM missions WHERE id_utilisateur=:id_utilisateur ORDER BY id DESC LIMIT :offset, :limit');
    $req->bindParam(':offset', $offset, PDO::PARAM_INT);
    $req->bindParam(':limit', $limit, PDO::PARAM_INT);
    $req->bindParam(':id_utilisateur', $param['id_utilisateur'], PDO::PARAM_INT);
    $req->execute();
    $missions = $req->fetchAll();
    
    return $missions;
}

function get_missions($offset, $limit)
{
    global $bdd;
    $offset = (int) $offset;
    $limit = (int) $limit;
        
    $req = $bdd->prepare('SELECT * FROM missions ORDER BY id DESC LIMIT :offset, :limit');
    $req->bindParam(':offset', $offset, PDO::PARAM_INT);
    $req->bindParam(':limit', $limit, PDO::PARAM_INT);
    $req->execute();
    $missions = $req->fetchAll();
    
    return $missions;
}
