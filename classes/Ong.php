<?php

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['idOng'])) {
    $idDaOng = $_SESSION['idOng'];
}

class Ong
{

    private $nomeOng;
    private $cepOng;
    private $estadoOng;
    private $cidadeOng;
    private $bairroOng;
    private $logradouroOng;
    private $numOng;
    private $complOng;
    private $loginOng;
    private $senhaOng;
    private $telefoneOng;
    private $fotoOng;

    public function setNomeOng($nomeOng)
    {
        $this->nomeOng = $nomeOng;
    }
    public function getNomeOng()
    {
        return $this->nomeOng;
    }

    public function setCepOng($cepOng)
    {
        $this->cepOng = $cepOng;
    }
    public function getCepOng()
    {
        return $this->cepOng;
    }

    public function setEstadoOng($estadoOng)
    {
        $this->estadoOng = $estadoOng;
    }
    public function getEstadoOng()
    {
        return $this->estadoOng;
    }

    public function setCidadeOng($cidadeOng)
    {
        $this->cidadeOng = $cidadeOng;
    }
    public function getCidadeOng()
    {
        return $this->cidadeOng;
    }

    public function setBairroOng($bairroOng)
    {
        $this->bairroOng = $bairroOng;
    }
    public function getBairroOng()
    {
        return $this->bairroOng;
    }

    public function setLogradouroOng($logradouroOng)
    {
        $this->logradouroOng = $logradouroOng;
    }
    public function getLogradouroOng()
    {
        return $this->logradouroOng;
    }

    public function setNumOng($numOng)
    {
        $this->numOng = $numOng;
    }
    public function getNumOng()
    {
        return $this->numOng;
    }

    public function setComplOng($complOng)
    {
        $this->complOng = $complOng;
    }
    public function getComplOng()
    {
        return $this->complOng;
    }

    public function setLoginOng($loginOng)
    {
        $this->loginOng = $loginOng;
    }
    public function getLoginOng()
    {
        return $this->loginOng;
    }

    public function setSenhaOng($senhaOng)
    {
        $this->senhaOng = $senhaOng;
    }
    public function getSenhaOng()
    {
        return $this->senhaOng;
    }

    public function setTelefoneOng($telefoneOng)
    {
        $this->telefoneOng = $telefoneOng;
    }
    public function getTelefoneOng()
    {
        return $this->telefoneOng;
    }

    public function setFotoOng($fotoOng)
    {
        $this->fotoOng = $fotoOng;
    }
    public function getFotoOng()
    {
        return $this->fotoOng;
    }


    public function Cadastrar(
        $nomeOng,
        $cepOng,
        $estadoOng,
        $cidadeOng,
        $bairroOng,
        $logradouroOng,
        $numOng,
        $complOng,
        $loginOng,
        $senhaOng,
        $telefoneOng,
        $FotoOng
    ) {

        try {

            $conexao = Conexao::pegarConexao();

            $stmt = $conexao->prepare("
            INSERT INTO tbong 
            (nomeOng, cepOng, estadoOng, cidadeOng, bairroOng, logradouroOng, numOng, complementoOng,
             loginOng, senhaOng, telefoneOng, fotoOng)
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?)
        ");

            $stmt->bindValue(1, $nomeOng);
            $stmt->bindValue(2, $cepOng);
            $stmt->bindValue(3, $estadoOng);
            $stmt->bindValue(4, $cidadeOng);
            $stmt->bindValue(5, $bairroOng);
            $stmt->bindValue(6, $logradouroOng);
            $stmt->bindValue(7, $numOng);
            $stmt->bindValue(8, $complOng);
            $stmt->bindValue(9, $loginOng);
            $stmt->bindValue(10, $senhaOng);
            $stmt->bindValue(11, $telefoneOng);
            $stmt->bindValue(12, $FotoOng);

            $ok = $stmt->execute();



            if (!$ok) {
                print_r($stmt->errorInfo());
                exit;
            }

            return "OK";
        } catch (Exception $e) {
            return "ERRO: " . $e->getMessage();
        }
    }

    public function Selecionar($email)
{
    $conexao = Conexao::pegarConexao();

    $stmt = $conexao->prepare(
        "SELECT * FROM tbOng WHERE loginOng = :email"
    );

    $stmt->bindValue(':email', $email);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

    //Função para exibir todos os animais e cliente, da pagina 'area-restrita/animais-adotados.php'
    public function ListAll($idDaOng)
    {
        try {
            $conexao = Conexao::pegarConexao();
            $querySelect = "SELECT nomeOng, nomeCliente, cpfCliente, rgCliente, emailCliente, cepCliente, telefoneCliente, fotoCliente
          , nomeAnimal, idadeAnimal, coloracaoAnimal, tbsexoanimal.sexoAnimal, tbespecieanimal.descEspecie
          , tbracaanimal.nomeRacaAnimal, tbporteanimal.nomePorteAnimal, fotoAnimal FROM tbong
          INNER JOIN tbanimal ON tbong.idOng = tbanimal.idOng
            INNER JOIN tbsexoanimal ON tbanimal.idSexoAnimal = tbsexoanimal.idSexoAnimal
            INNER JOIN tbespecieanimal ON tbanimal.idEspecieAnimal = tbespecieanimal.idEspecieAnimal
            INNER JOIN tbracaanimal ON tbanimal.idRacaAnimal = tbracaanimal.idRacaAnimal
            INNER JOIN tbporteanimal ON tbanimal.idPorteAnimal = tbporteanimal.idPorteAnimal
            INNER JOIN tbregistroadocao ON tbanimal.idAnimal = tbregistroadocao.idAnimal
            INNER JOIN tbcliente ON tbregistroadocao.idCliente = tbcliente.idCliente
            WHERE tbong.idOng = '$idDaOng'
                        ";

            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;
        } catch (Exception $e) {
            echo "ERRO " . $e->getMessage();
        }
    }

    public function listar($idDaOng)
    {
        $conexao = Conexao::pegarConexao();
        $querySelect = "SELECT nomeOng ,cepOng, logradouroOng, numOng, complementoOng ,bairroOng, cidadeOng , estadoOng FROM tbong
                            INNER JOIN tbanimal ON tbong.idOng = tbanimal.idOng
                            WHERE idAnimal = '1'";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function listarOngs()
    {
        $conexao = Conexao::pegarConexao();
        $querySelect = "SELECT * FROM tbong";

        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function BuscarEmail($email)
    {
        $conexao = Conexao::pegarConexao();
        $sql = $this->$conexao->prepare("SELECT * FROM ong WHERE login = :email");

        $sql->bindValue(':email', $email);

        $sql->execute();

        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    //lista todas as ongs COUNT na pagina pdf do admin
    public function GraficoOng()
    {
        $conexao = Conexao::pegarConexao();
        $querySelect = "
                        select COUNT(idOng) 'ong' from tbong 
                        ";
        $resultado = $conexao->query($querySelect);

        $i = 0;
        while ($lista = $resultado->fetch($conexao::FETCH_ASSOC)) {

            $array[$i] = $lista['ong'];
            $i++;
        }
        return $array;
    }
}
