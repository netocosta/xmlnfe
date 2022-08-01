<?php 

// Transformando arquivo XML em Objeto
$xml = simplexml_load_file("xml/".$_GET['arquivo']);


// Exibe as informações do XML
echo "<h3>Informações da Nota Fiscal</h3>";
echo 'Chave de Acesso: ' . str_replace("NFe", "", $xml->infNFe['Id']) . '<br>';
echo 'Nota Fiscal: ' . $xml->infNFe->ide->nNF . '<br>';
echo 'Série: ' . $xml->infNFe->ide->serie . '<br>';
echo 'Data de Emissão: ' . date('d/m/Y', strtotime($xml->infNFe->ide->dEmi)) . '<br>';

echo "<h3>Emitente</h3>";
echo 'Emitente/CNPJ: ' . $xml->infNFe->emit->CNPJ . '<br>';
echo 'Emitente/Razão Social: ' . $xml->infNFe->emit->xNome . '<br>';
echo 'Endereço: ' . $xml->infNFe->emit->enderEmit->xLgr . ', ' . $xml->infNFe->emit->enderEmit->nro . '<br>';

echo "<h3>Destinatário</h3>";
echo 'Destinatario/Doc: ' . $xml->infNFe->dest->CNPJ . '<br>';
echo 'Destinatario/Nome: ' . $xml->infNFe->dest->xNome . '<br>';
echo 'Endereço: ' . $xml->infNFe->dest->enderDest->xLgr . ', ' . $xml->infNFe->dest->enderDest->nro . '<br>';

echo "<h3>Produtos</h3>";
echo "<table cellspacing='2' cellpadding='2' border='1'>";
echo "<tr>";
echo "<td><b>#</b></td>";
echo "<td><b>Código</b></td>";
echo "<td><b>Produto</b></td>";
echo "<td><b>Valor</b></td>";
echo "</tr>";
foreach($xml->infNFe->det as $item) {
	echo "<tr>";
	echo "<td>#{$item['nItem']}</td>";
	echo "<td>{$item->prod->cProd}</td>";
	echo "<td>{$item->prod->xProd}</td>";
	echo "<td>{$item->prod->vProd}</td>";
	echo "</tr>";
}
echo "</table>";

echo "<h3>Valores</h3>";
echo 'Base de Cálculo: ' . $xml->infNFe->total->ICMSTot->vBC . '<br>';
echo 'Valor Produtos: ' . $xml->infNFe->total->ICMSTot->vProd . '<br>';
echo 'PIS: ' . $xml->infNFe->total->ICMSTot->vPIS . '<br>';
echo 'COFINS: ' . $xml->infNFe->total->ICMSTot->vCOFINS . '<br>';

echo "<br>";

echo "<a href='lista.php'>Ir para lista de arquivos.</a><br />";
echo "<a href='index.php'>Ir para envio de arquivos.</a><br />";
/*echo 'Data de Atualização: ' . $xml->data_atualizacao . '<br>';
// Percorre todos os registros de vendas
foreach($xml->venda as $registro) {
	echo 'Código da Venda: ' . $registro->cod_venda . '<br>';
	echo 'Cliente: ' . $registro->cliente . '<br>';
	echo 'Email: ' . $registro->email . '<br>';

        // Percorre todos os itens da venda
	foreach($registro->itens->item as $item):
		echo 'Código do Produto: ' . $item->cod_produto . '<br>';
		echo 'Quantidade: ' . $item->qtde . '<br>';
		echo 'Descrição do Produto: ' . $item->descricao . '<br>';
	endforeach;

	echo '<hr>';
}*/
