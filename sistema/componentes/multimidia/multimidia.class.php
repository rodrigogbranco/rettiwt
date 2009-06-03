<?php
global $diretorioSistemaComponentes;
require_once ($diretorioSistemaComponentes."acessabd/acessabd.class.php");

/**
 * Classe do modelo de controle de arquivos que serão enviados pelo usuario.
 */
class Multimidia extends AcessaBD
{
  public $id;
  public $nomeantigo;
  public $nomenovo;
  public $tamanho;
  public $id_usuario;
  public $tipo;

  protected $uploadDir;

  /*
   * Tipos usados para saber qual tipo de mídia é
   */
  const IMAGEM = 1;
  const VIDEO = 2;

  public function __construct($nomeCampo ='', $valorCampo ='')
  {
    global $diretorioRaiz;

    $this->nomeTabela = 'multimidia';
    $this->nomeCampos = array('id','nomeantigo','nomenovo','tamanho','id_usuario','tipo');
    $this->uploadDir = $diretorioRaiz."multimidia/";

    parent::__construct($nomeCampo, $valorCampo);
  }

  public function save($nomeCampo)
  {
    // Salvamos o nome antigo e seu tamanho para fins "históricos"
    $this->nomeantigo = $_FILES[$nomeCampo]['name'];
    $this->tamanho = $_FILES[$nomeCampo]['size'];

    $strCortada = explode('.',$_FILES[$nomeCampo]['name']);
    $numeroCortes = count($strCortada);

    // Geramos um nome aleatorio via hash, para nao haver colisão de arquivos
    // iguais dentro da pasta
    $this->nomenovo = sha1($_FILES[$nomeCampo]['name'].rand()).".".$strCortada[$numeroCortes-1];

    // Nome definitivo no sistema de arquivos
    $uploadFile = $this->uploadDir . $this->nomenovo;

    // Salvamos no sistema de arquivos
    if ( !move_uploaded_file($_FILES[$nomeCampo]['tmp_name'], $uploadFile) )
    {
      throw new Exception('Erro no upload do arquivo: '.$_FILES[$nomeCampo]['error']);
    }

    // E salvamos as informações no banco de dados
    parent::save();
  }

  public function remove()
  {
    // Deletamos o arquivo do sistema de arquivos...
    unlink($this->uploadDir . $this->nomenovo);

    parent::remove();
  }

  /**
   * Redimensiona uma imagem já salva no banco de dados e no sistema de arquivos.
   * A imagem original _não_ é preservada. Se algum dos dois parâmetros for 0(zero)
   * a imagem será redimensionada baseada no outro tamanho, preservando sua escala.
   *
   * @param integer $xSize Largura da imagem
   * @param integer $ySize Altura da imagem
   */
  public function resizeImage($xSize = -1, $ySize = -1)
  {
    if ($this->tipo == Multimidia::IMAGEM)
    {
      if (( $xSize > -1 ) && ( $ySize > -1))
      {
        $thumb = new Imagick($this->uploadDir.$this->nomenovo);

        $thumb->resizeImage($xSize,$ySize,Imagick::FILTER_LANCZOS,1);
        $thumb->writeImage($this->uploadDir.$this->nomenovo);

        $thumb->destroy();
      }
    }
    else
    {
      throw new Exception("Este objeto não é uma Imagem, é um Vídeo.");
    }
  }
}

?>
