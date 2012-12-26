	<div class="produit">
<p>Produit</p>
<div id="produitcase">
<p>Drum sticks</p>
<img src="images/store/BG1.png"></br>
<a <a href="" onclick="addItemPanier('drum')">Ajouter au panier</a>
<p class="description">Drum sticks with Weexa Studio logo! good music show</p>
</div>
<div id="produitcase">
<p>Stickers</p>
<img src="images/store/BG1.png"></br>
<a <a href="" onclick="addItemPanier('stickers')">Ajouter au panier</a>
<p class="description">Stick it everywhere!</p>
</div>
<div id="produitcase">
<p>Donate</p>
<img src="images/store/BG1.png"></br>
<a onclick="addItemPanier('donate')" href="">Ajouter au panier</a>
<p class="description">faite un don pour soutenir le projet Weexa Studio</p>
</div>
</div>
<div class="panelgauchestore">
<ul class="logostore"><li><img src="images/weexastore.png"/></li><li><div class="weexastoretitle">Weexa Store</div></li></br></br></br></br>
	<div id="panier">
			<p>Panier</p>
			<div class="tablecontenerstore">
				<form method="POST" action="index.php?site=buy">
					<table id="listpanier">
						<tr>
							<td>
								<input style="width: 40px;" name="drum" type="text" value="1"/>
							</td>
							<td>
								Drum sticks
							</td>
							<td>
								50€
							</td>
							<td>
								<a title="Supprimer" style="color: red;" href="#">X</a>
							</td>
						</tr>
	
						<tr>
							<td>
								<input style="width: 40px;" name="stickers" type="text" value="1"/>
							</td>
							<td>
								Stickers
							</td>
							<td>
								12€
							</td>
							<td>
								<a title="Supprimer" style="color: red;" href="#">X</a>
							</td>
						</tr>
	
						<tr>
							<td>
								<input style="width: 40px;" name="donate" type="text" value="1"/>
							</td>
							<td>
								donations
							</td>
							<td>
								50€
							</td>
							<td>
								<a title="Supprimer" style="color: red;" href="#">X</a>
							</td>
						</tr>
					</table>
			</div>
					<input class="panier_submit" type="submit" value="Passez commande >"/>
				</form>
		</div>
</div>


