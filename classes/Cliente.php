<?php
require_once 'Conexao.php';
require_once 'Animal.php';


if(!isset($_SESSION)) 
    { 
        session_start();
        
        $idDoCliente = $_SESSION['idCliente'] ?? null;
    }
    
   
    

class Cliente{
    private $nomeCliente;
    private $cpfCliente;
    private $rgCliente;
    private $cepCliente;
    private $estadoCliente;
    private $cidadeCliente;
    private $bairroCliente;
    private $ruaCliente;
    private $numCliente;
    private $complCliente;
    private $emailCliente;
    private $senhaCliente;
    private $telefoneCliente;
    private $fotoCliente;


    public function getNomeCliente(){
        return $this->nomeCliente;
    }
    public function setNomeCliente($nome){
        $this->nomeCliente = $nome;
    }

    public function getCpfCliente(){
        return $this->cpfCliente;
    }
    public function setCpfCliente($cpf){
        $this->cpfCliente = $cpf;
    }

    public function getRgCliente(){
        return $this->rgCliente;
    }
    public function setRgCliente($rg){
        $this->rgCliente = $rg;
    }

    public function getCepCliente(){
        return $this->cepCliente;
    }
    public function setCepCliente($cep){
        $this->cepCliente = $cep;
    }

    public function getEstadoCliente(){
        return $this->estadoCliente;
    }
    public function setEstadoCliente($estado){
        $this->estadoCliente = $estado;
    }

    public function getCidadeCliente(){
        return $this->cidadeCliente;
    }
    public function setCidadeCliente($cidade){
        $this->cidadeCliente = $cidade;
    }

    public function getBairroCliente(){
        return $this->bairroCliente;
    }
    public function setBairroCliente($bairro){
        $this->bairroCliente = $bairro;
    }

    public function getRuaCliente(){
        return $this->ruaCliente;
    }
    public function setRuaCliente($rua){
        $this->ruaCliente = $rua;
    }

    public function getNumCliente(){
        return $this->numCliente;
    }
    public function setNumCliente($num){
        $this->numCliente = $num;
    }

    public function getComplCliente(){
        return $this->complCliente;
    }
    public function setComplCliente($compl){
        $this->complCliente = $compl;
    }

    public function getEmailCliente(){
        return $this->emailCliente;
    }
    public function setEmailCliente($email){
        $this->emailCliente = $email;
    }

    public function getSenhaCliente(){
        return $this->senhaCliente;
    }
    public function setSenhaCliente($senha){
        $this->senhaCliente = $senha;
    }

    public function getTelefoneCliente(){
        return $this->telefoneCliente;
    }
    public function setTelefoneCliente($telefoneCliente){  
        $this->telefoneCliente = $telefoneCliente;
    }

    public function getFotoCliente(){
        return $this->FotoCliente;
    }
    public function setFotoCliente($fotoCliente){
        $this->FotoCliente = $fotoCliente;
    }
    

    public function Cadastrar($nomeCliente, $cpfCliente, $rgCliente, $cepCliente, $estadoCliente, $cidadeCliente
    ,$bairroCliente, $ruaCliente, $numCliente, $complCliente, $emailCliente, $senhaCliente, $telefoneCliente, $fotoCliente){
        try{
            $conexao = Conexao::pegarConexao();

            $stmt = $conexao->prepare("INSERT INTO tbcliente(nomeCliente, cpfCliente, rgCliente
                                                            ,cepCliente, estadoCliente, cidadeCliente
                                                            ,bairroCliente, ruaCliente, numCliente 
                                                            ,complementoCliente, emailCliente, senhaCliente
                                                            ,telefoneCliente, fotoCliente)
            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            
            $stmt->bindParam(1, $nomeCliente );
            $stmt->bindParam(2, $cpfCliente);
            $stmt->bindParam(3, $rgCliente);
            $stmt->bindParam(4, $cepCliente);
            $stmt->bindParam(5, $estadoCliente);
            $stmt->bindParam(6, $cidadeCliente);
            $stmt->bindParam(7, $bairroCliente);
            $stmt->bindParam(8, $ruaCliente);
            $stmt->bindParam(9, $numCliente);
            $stmt->bindParam(10, $complCliente);
            $stmt->bindParam(11, $emailCliente);
            $stmt->bindParam(12, $senhaCliente);      
            $stmt->bindParam(13, $telefoneCliente); 
            $stmt->bindParam(14, $fotoCliente); 

            $stmt->execute();
        }
        catch(Exception $e){
            echo "ERRO: " . $e->getMessage();
        }
    }

    //Validação de e-mail para ver se existe
    public function BuscarEmail($email){

    try{

        $conexao = Conexao::pegarConexao();

        $stmt = $conexao->prepare("SELECT * FROM tbCliente WHERE emailCliente = :email");

        $stmt->bindValue(':email', $email);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);

    }
    catch(PDOException $e){

        echo "ERRO " . $e->getMessage();
    }
}


    //mostra todos os clientes na tela do admin/dadosGerais.php
    public function listarCliente(){
        $conexao = Conexao::pegarConexao();
        $querySelect = "SELECT idCliente, nomeCliente, cpfCliente, rgCliente, emailCliente, senhaCliente
        ,cepCliente, ruaCliente, numCliente, complementoCliente 
        ,bairroCliente, cidadeCliente , estadoCliente
        from tbcliente";

        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;   
    }

    //mostra as informações do cliente na tela usuario/perfil-editar.php
    public function listarClienteUpdate($idDoCliente){
        $conexao = Conexao::pegarConexao();
        $querySelect = $conexao->prepare("SELECT nomeCliente, cpfCliente, rgCliente, emailCliente, senhaCliente
        ,cepCliente, ruaCliente, numCliente, complementoCliente 
        ,bairroCliente, cidadeCliente , estadoCliente
        from tbcliente WHERE idCliente= :id");
        
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;   
    }

    //Função para exibir todos os animais da pagina 'usuario/perfil-adocao.php'
    public function List($idDoCliente) {
        try{
          $conexao = Conexao::pegarConexao();
          $querySelect = "SELECT nomeOng, cepOng, estadoOng, cidadeOng, bairroOng, logradouroOng, numOng, telefoneOng, fotoOng
          , nomeAnimal, idadeAnimal, coloracaoAnimal, tbsexoanimal.sexoAnimal, tbespecieanimal.descEspecie
          , tbracaanimal.nomeRacaAnimal, tbporteanimal.nomePorteAnimal, fotoAnimal FROM tbong

            INNER JOIN tbanimal ON tbong.idOng = tbanimal.idOng
            INNER JOIN tbsexoanimal ON tbanimal.idSexoAnimal = tbsexoanimal.idSexoAnimal
            INNER JOIN tbespecieanimal ON tbanimal.idEspecieAnimal = tbespecieanimal.idEspecieAnimal
            INNER JOIN tbracaanimal ON tbanimal.idRacaAnimal = tbracaanimal.idRacaAnimal
            INNER JOIN tbporteanimal ON tbanimal.idPorteAnimal = tbporteanimal.idPorteAnimal
            INNER JOIN tbregistroadocao ON tbanimal.idAnimal = tbregistroadocao.idAnimal
            INNER JOIN tbcliente ON tbregistroadocao.idCliente = tbcliente.idCliente
                 WHERE tbcliente.idCliente = '$idDoCliente'
                ";
                //  WHERE tbong.idOng = '$idDaOng' AND tbanimal.idAnimal = '1' AND tbcliente.idCliente = '$idDoCliente'";
                           
          $resultado = $conexao->query($querySelect);
          $lista = $resultado->fetchAll();
          return $lista; 
  
        }
        catch(Exception $e) {
          echo "ERRO " . $e->getMessage();
        }
      }

    public function Listar() {
        try{
            $conexao = Conexao::pegarConexao();
            $stmt = $conexao->prepare("SELECT * FROM tbCliente");
            $stmt->execute();

            while($linha = $stmt->fetch(PDO::FETCH_BOTH)){
                $_SESSION['idCliente'] = $linha['idCliente'];
                $_SESSION['nomeCliente'] = $linha['nomeCliente'];
            }
        }
        catch(PDOException $e) {
            echo "ERRO" . $e->getMessage();
        }
    }

    //função para exibir a quantidade de clientes cadastrados no PDF do admin
    public function Grafico(){
        $conexao = Conexao::pegarConexao();
        $querySelect = "
                        select COUNT(idCliente) 'cliente' from tbcliente 
                        ";
        $resultado = $conexao->query($querySelect);

        $i = 0;
        while($lista=$resultado->fetch($conexao::FETCH_ASSOC)){

            $array[$i]= $lista['cliente'];
            $i++;
        }
        return $array;
    }

    public function Selecionar($email)
{
    $conexao = Conexao::pegarConexao();

    $stmt = $conexao->prepare(
        "SELECT * FROM tbCliente WHERE emailCliente = :email"
    );

    $stmt->bindValue(':email', $email);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}
}