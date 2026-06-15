<!-- cadastrar Animal -->

<?php

class Animal {
    private $nomeAnimal;
    private $idadeAnimal;
    private $coloracao;
    private $fotoAnimal;
    private $SexoAnimal;
    private $Porte;
    private $Raca;
    private $Especie;
    
    public function getNomeAnimal() {
      return $this->nomeAnimal;
    }
    public function setNomeAnimal($nomeAnimal) {
      $this->nomeAnimal = $nomeAnimal;
    }

    public function getIdadeAnimal() {
      return $this->idadeAnimal;
    }
    public function setIdadeAnimal($idadeAnimal) {
      $this->idadeAnimal = $idadeAnimal;
    }

    public function getColoracao() {
      return $this->coloracao;
    }
    public function setColoracao($coloracao) {
      $this->coloracao = $coloracao;
    }

    public function getFotoAnimal() {
      return $this->fotoAnimal;
    }
    public function setFotoAnimal($fotoAnimal) {
      $this->fotoAnimal = $fotoAnimal;
    }

    public function getSexoAnimal() {
      return $this->SexoAnimal;
    }
    public function setSexoAnimal($SexoAnimal) {
      $this->SexoAnimal = $SexoAnimal;
    }

    public function getPorteAnimal() {
      return $this->Porte;
    }
    public function setPorteAnimal($PorteAnimal) {
      $this->Porte = $PorteAnimal;
    }

    public function getRacaAnimal() {
      return $this->Raca;
    }
    public function setRacaAnimal($Raca) {
      $this->Raca = $Raca;
    }

    public function getEspecieAnimal() {
      return $this->Especie;
    }
    public function setEspecieAnimal($Especie) {
      $this->Especie = $Especie;
    }

    public function CadastrarAnimal($nome, $idadeAnimal, $coloracao, $SexoAnimal, $EspecieAnimal, $RacaAnimal, $PorteAnimal, $Ong, $FotoAnimal) {
      try{
        $conexao = Conexao::pegarConexao();

        $stmt = $conexao->prepare("INSERT INTO tbanimal (nomeAnimal, statusAnimal, idadeAnimal, coloracaoAnimal, idSexoAnimal, idEspecieAnimal, idRacaAnimal, idPorteAnimal, idOng, fotoAnimal)
        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bindValue(1, $nome);
        $stmt->bindValue(2, 'não adotado');
        $stmt->bindValue(3, $idadeAnimal);
        $stmt->bindValue(4, $coloracao);
        $stmt->bindValue(5, $SexoAnimal);
        $stmt->bindValue(6, $EspecieAnimal);
        $stmt->bindValue(7, $RacaAnimal);
        $stmt->bindValue(8, $PorteAnimal);
        $stmt->bindValue(9, $Ong);
        $stmt->bindValue(10, $FotoAnimal);

        $stmt->execute();
      }
      catch(Exception $e) {
        echo "ERRO" . $e->getMessage();
      }
    }

    public function ListarTudo() {
      try{
        $conexao = Conexao::pegarConexao();
        $querySelect = "SELECT * FROM tbanimal
        INNER JOIN tbsexoanimal ON tbanimal.idSexoAnimal = tbsexoanimal.idSexoAnimal
        INNER JOIN tbespecieanimal ON tbanimal.idEspecieAnimal = tbespecieanimal.idEspecieAnimal
        INNER JOIN tbracaanimal ON tbanimal.idRacaAnimal = tbracaanimal.idRacaAnimal
        INNER JOIN tbporteanimal ON tbanimal.idPorteAnimal = tbporteanimal.idPorteAnimal
        WHERE statusAnimal ='não adotado';
        
        ";
       
                         
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista; 

      }
      catch(Exception $e) {
        echo "ERRO " . $e->getMessage();
      }
    }



    public function ListarAdotados() {
      try{
        $conexao = Conexao::pegarConexao();
        $querySelect = "SELECT * FROM tbanimal
        INNER JOIN tbsexoanimal ON tbanimal.idSexoAnimal = tbsexoanimal.idSexoAnimal
        INNER JOIN tbespecieanimal ON tbanimal.idEspecieAnimal = tbespecieanimal.idEspecieAnimal
        INNER JOIN tbracaanimal ON tbanimal.idRacaAnimal = tbracaanimal.idRacaAnimal
        INNER JOIN tbporteanimal ON tbanimal.idPorteAnimal = tbporteanimal.idPorteAnimal
        INNER JOIN tbregistroadocao ON tbanimal.idAnimal = tbregistroadocao.idAnimal
        WHERE statusRegistro = 'adotado';
        
        ";
       
                         
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista; 

      }
      catch(Exception $e) {
        echo "ERRO " . $e->getMessage();
      }
    }

    public function ListarAdotadosOng($idOng) {
      try{
        $conexao = Conexao::pegarConexao();
        $querySelect = "SELECT * FROM tbanimal
        INNER JOIN tbsexoanimal ON tbanimal.idSexoAnimal = tbsexoanimal.idSexoAnimal
        INNER JOIN tbespecieanimal ON tbanimal.idEspecieAnimal = tbespecieanimal.idEspecieAnimal
        INNER JOIN tbracaanimal ON tbanimal.idRacaAnimal = tbracaanimal.idRacaAnimal
        INNER JOIN tbporteanimal ON tbanimal.idPorteAnimal = tbporteanimal.idPorteAnimal
        INNER JOIN tbregistroadocao ON tbanimal.idAnimal = tbregistroadocao.idAnimal
        WHERE idOng = '$idOng' AND statusRegistro = 'adotado';
        
        ";
       
                         
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista; 

      }
      catch(Exception $e) {
        echo "ERRO " . $e->getMessage();
      }
    }

    public function ListarAnimal($sexoAnimal, $idOng) {
      try{
        $conexao = Conexao::pegarConexao();
        $querySelect = "SELECT nomeAnimal, idadeAnimal, coloracaoAnimal, sexoAnimal, descEspecie, nomeRacaAnimal, nomePorteAnimal, fotoAnimal FROM tbanimal
                            INNER JOIN tbsexoanimal ON tbanimal.idSexoAnimal = tbsexoanimal.idSexoAnimal
                              INNER JOIN tbespecieanimal ON tbanimal.idEspecieAnimal = tbespecieanimal.idEspecieAnimal
                                INNER JOIN tbracaanimal ON tbanimal.idRacaAnimal = tbracaanimal.idRacaAnimal
                                  INNER JOIN tbporteanimal ON tbanimal.idPorteAnimal = tbporteanimal.idPorteAnimal
                                    WHERE idOng = '$idOng' AND tbanimal.idSexoAnimal = '$sexoAnimal'";
                         
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista; 

      }
      catch(Exception $e) {
        echo "ERRO " . $e->getMessage();
      }
    }

    public function ListarCachorroAdotados($idOng) {
      try{
        $conexao = Conexao::pegarConexao();
        $querySelect = "SELECT * FROM tbanimal
        INNER JOIN tbsexoanimal ON tbanimal.idSexoAnimal = tbsexoanimal.idSexoAnimal
        INNER JOIN tbespecieanimal ON tbanimal.idEspecieAnimal = tbespecieanimal.idEspecieAnimal
        INNER JOIN tbracaanimal ON tbanimal.idRacaAnimal = tbracaanimal.idRacaAnimal
        INNER JOIN tbporteanimal ON tbanimal.idPorteAnimal = tbporteanimal.idPorteAnimal
        WHERE idOng = '$idOng' AND statusAnimal ='não adotado' AND tbanimal.idEspecieAnimal = '1'";
                         
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista; 

      }
      catch(Exception $e) {
        echo "ERRO " . $e->getMessage();
      }
    }

    public function ListarGatoAdotados($idOng) {
      try{
        $conexao = Conexao::pegarConexao();
        $querySelect = "SELECT * FROM tbanimal
        INNER JOIN tbsexoanimal ON tbanimal.idSexoAnimal = tbsexoanimal.idSexoAnimal
        INNER JOIN tbespecieanimal ON tbanimal.idEspecieAnimal = tbespecieanimal.idEspecieAnimal
        INNER JOIN tbracaanimal ON tbanimal.idRacaAnimal = tbracaanimal.idRacaAnimal
        INNER JOIN tbporteanimal ON tbanimal.idPorteAnimal = tbporteanimal.idPorteAnimal
        WHERE idOng = '$idOng' AND statusAnimal ='não adotado' AND tbanimal.idEspecieAnimal = '2'";
                         
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista; 

      }
      catch(Exception $e) {
        echo "ERRO " . $e->getMessage();
      }
    }

    public function ListarCaes(){
      try{
        $conexao = Conexao::pegarConexao();
        $querySelect = "SELECT idAnimal, nomeAnimal, idadeAnimal, coloracaoAnimal, sexoAnimal, descEspecie, nomeRacaAnimal, nomePorteAnimal, fotoAnimal FROM tbanimal
                            INNER JOIN tbsexoanimal ON tbanimal.idSexoAnimal = tbsexoanimal.idSexoAnimal
                              INNER JOIN tbespecieanimal ON tbanimal.idEspecieAnimal = tbespecieanimal.idEspecieAnimal
                                INNER JOIN tbracaanimal ON tbanimal.idRacaAnimal = tbracaanimal.idRacaAnimal
                                  INNER JOIN tbporteanimal ON tbanimal.idPorteAnimal = tbporteanimal.idPorteAnimal
                                    WHERE tbanimal.idEspecieAnimal = '1'";
                         
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista; 

      }
      catch(Exception $e) {
        echo "ERRO " . $e->getMessage();
      }
    }

    public function ListarGatos(){
      try{
        $conexao = Conexao::pegarConexao();
        $querySelect = "SELECT idAnimal, nomeAnimal, idadeAnimal, coloracaoAnimal, sexoAnimal, descEspecie, nomeRacaAnimal, nomePorteAnimal, fotoAnimal FROM tbanimal
                            INNER JOIN tbsexoanimal ON tbanimal.idSexoAnimal = tbsexoanimal.idSexoAnimal
                              INNER JOIN tbespecieanimal ON tbanimal.idEspecieAnimal = tbespecieanimal.idEspecieAnimal
                                INNER JOIN tbracaanimal ON tbanimal.idRacaAnimal = tbracaanimal.idRacaAnimal
                                  INNER JOIN tbporteanimal ON tbanimal.idPorteAnimal = tbporteanimal.idPorteAnimal
                                    WHERE tbanimal.idEspecieAnimal = '2'";
                         
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista; 

      }
      catch(Exception $e) {
        echo "ERRO " . $e->getMessage();
      }
    }
    
    //Mostra as informações do animal do satusAnimal.php
    public function listar2($id)
{
    try {

        $conexao = Conexao::pegarConexao();

        $stmt = $conexao->prepare("
            SELECT
                nomeAnimal,
                idadeAnimal,
                coloracaoAnimal,
                sexoAnimal,
                descEspecie,
                nomeRacaAnimal,
                nomePorteAnimal,
                fotoAnimal
            FROM tbanimal
            INNER JOIN tbsexoanimal
                ON tbanimal.idSexoAnimal = tbsexoanimal.idSexoAnimal
            INNER JOIN tbespecieanimal
                ON tbanimal.idEspecieAnimal = tbespecieanimal.idEspecieAnimal
            INNER JOIN tbracaanimal
                ON tbanimal.idRacaAnimal = tbracaanimal.idRacaAnimal
            INNER JOIN tbporteanimal
                ON tbanimal.idPorteAnimal = tbporteanimal.idPorteAnimal
            WHERE idAnimal = :id
        ");

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {

        echo "ERRO: " . $e->getMessage();
    }
}

    //Mostra as informações da ONG do satusAnimal.php
    public function listarOng($id){
      $conexao = Conexao::pegarConexao();
      $querySelect = "SELECT nomeOng ,cepOng, logradouroOng, numOng, complementoOng ,bairroOng, cidadeOng , estadoOng, telefoneOng FROM tbong
                          INNER JOIN tbanimal ON tbong.idOng = tbanimal.idOng
                          WHERE idAnimal = '$id'";
      $resultado = $conexao->query($querySelect);
      $lista = $resultado->fetchAll();
      return $lista;   
  }

   public function pegarAnimal($id)
{
    try {

        $conexao = Conexao::pegarConexao();

        $stmt = $conexao->prepare("
            SELECT *
            FROM tbanimal
            WHERE idAnimal = :id
        ");

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {

        echo "ERRO: " . $e->getMessage();
    }
}

    
    // public function listar(){
    //     $conexao = Conexao::pegarConexao();
    //     $querySelect = "select idAnimal, nomeAnimal, 
    //                     idadeAnimal, coloracao, FotoAnimal, SexoAnimal, Porte, Raca, Especie from tbanimal";
    //     $resultado = $conexao->query($querySelect);
    //     $lista = $resultado->fetchAll();
    //     return $lista;   
    // }

   public function GraficoAnimal(){

    $conexao = Conexao::pegarConexao();

    $querySelect = "
        SELECT nomeAnimal,
        COUNT(tbespecieanimal.idEspecieAnimal) AS animal
        FROM tbanimal
        INNER JOIN tbespecieanimal
        ON tbanimal.idEspecieAnimal = tbespecieanimal.idEspecieAnimal
        GROUP BY descEspecie
    ";

    $resultado = $conexao->query($querySelect);

    $array = [];

    $i = 0;

    while($lista = $resultado->fetch(PDO::FETCH_ASSOC)){

        $array[$i] = $lista['animal'];
        $i++;
    }

    return $array;
}
  public function GraficoAnimal2(){
    $conexao = Conexao::pegarConexao();
    $querySelect = "select COUNT(idRegistroAdocao) 'registro' from tbregistroadocao";
    $resultado = $conexao->query($querySelect);

  $array = [];

    $i = 0;
    while($lista=$resultado->fetch($conexao::FETCH_ASSOC)){
        
        $array[$i]= $lista['registro'];
        $i++;
    }
    return $array;   
}
    
}
  

