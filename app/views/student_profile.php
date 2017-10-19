<div class="pad15">
	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-12">
					<div class="block center-block">
						<div class="row">
							<div class="col-md-5">
								<img src="{{ config.apiUrl + profile.avatar }}" class="img-circle profile_picture"><br>
							</div>
							<div class="col-md-7">
								<h2>{{profile.firstname}} <span class="uppercase">{{profile.lastname}}</span></h2>
								<h3 class="title_h3">{{profile.group.description}}</h3><br>
								<span class="glyphicon glyphicon-envelope mrs" aria-hidden="true"></span>{{profile.email}}
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="block">
						<h2 class="title_h2">Evènements du jour</h2>

						<div class="pull-right" style="margin-bottom: 15px;">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									21/01/2016 <span class="caret"></span>
								</button>
								<ul class="dropdown-menu pull-right">
									<li><a href="#">21/01/2016</a>
									</li>
									<li><a href="#">22/01/2016</a>
									</li>
									<li><a href="#">23/01/2016</a>
									</li>
									<li><a href="#">24/01/2016</a>
									</li>
								</ul>
							</div>
						</div>

						<table>
							<thead>
							<tr>
								<th>Heure</th>
								<th>Matiere</th>
								<th>Salle</th>
								<th>Devoirs</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>de 10h à 12h</td>
								<td>Français</td>
								<td>A305</td>
								<td>
									<a href="#">
										<span class="glyphicon glyphicon-chevron-right"></span> Voir les devoirs
									</a>
								</td>
							</tr>
							<tr>
								<td>De 14h à 16h</td>
								<td>Math</td>
								<td>B206</td>
								<td>
									<a href="#">
										<span class="glyphicon glyphicon-chevron-right"></span> Voir les devoirs
									</a>
								</td>
							</tr>
							<tr>
								<td>De 16h à 17h</td>
								<td>Histoire</td>
								<td>B301</td>
								<td>
									<a href="#">
										<span class="glyphicon glyphicon-chevron-right"></span> Voir les devoirs
									</a>
								</td>
							</tr>
							<tr>
								<td>De 15h à 17h</td>
								<td>Math</td>
								<td>B206</td>
								<td>
									<a href="#">
										<span class="glyphicon glyphicon-chevron-right"></span> Voir les devoirs
									</a>
								</td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="block">
						<h2 class="title_h2">Devoirs</h2>
						<div ng-controller="HwrkMod">
							<table>
								<thead>
									<tr>
										<th>#</th>
										<th>Date</th>
										<th>Matière</th>
										<th>Description</th>
									</tr>
								</thead>
								<tbody>
									<tr ng-repeat="item in items | orderBy:sort.sortingOrder:sort.reverse">
										<td>{{item.id}}</td>
										<td>{{item.Date}}</td>
										<td>{{item.Matiere}}</td>
										<td>{{item.Exercices}}</td>
									</tr>
									<tr ng-show="items.length == 0">
										<td colspan="4" class="text-center">Aucun devoir enregistré</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="block">
						<h2 class="title_h2">Graphiques</h2>
						<div ng-controller="GraphMod">
							<canvas id="myChart" width="400" height="200"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="row">
				<div class="col-md-12">
					<div class="block">
						<h2 class="title_h2">Résumé des critères</h2>
						<div class="row">
							<div class="col-md-4 text-center c-white" ng-repeat="criteria_sum in profile.criteria_sums">
								<div class="{{criteria_sum.criterion.impact == 'positive' ? 'a-bav-block' : 'a-ab-block'}} center-block">
									<h3 class="title-h3 mtl">{{criteria_sum.criterion.name}}</h3>
									<p class="stats">{{ criteria_sum.sum | number : 0 }}</p>
								</div>
							</div>
							<div class="text-center" ng-show="profile.criteria_sums.length == 0">
								Aucun critère enregistré
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="center-block block pts">
						<h2 class="title_h2">Notifications</h2>
						<div ng-controller="NotifMod">
							<div class="row">
								<div class="col-md-12">
									<table>
										<thead>
											<tr>
												<th class="id" custom-sort order="'id'" sort="sort">#&nbsp;</th>
												<th class="Type" custom-sort order="'Type'" sort="sort">Type&nbsp;</th>
												<th class="Message" custom-sort order="'Message'" sort="sort">Message&nbsp;</th>
											</tr>
										</thead>
										<tbody>
											<tr ng-repeat="item in pagedItems[currentPage] | orderBy:sort.sortingOrder:sort.reverse" ng-class="{success : item.Type == 'Success!', danger : item.Type == 'Alerte!', warning : item.Type == 'Warning!', info : item.Type == 'Info!'}"/>
												<td>{{item.id}}</td>
												<td>{{item.Type}}</td>
												<td>{{item.Message}}</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12 text-right">
									<ul class="pagination" style="margin: 15px 0 0 0;">
										<li ng-class="{disabled: currentPage == 0}">
											<a href ng-click="prevPage()">« Prev</a>
										</li>
										<li ng-repeat="n in range(pagedItems.length, currentPage, currentPage + gap) "
										    ng-class="{active: n == currentPage}"
										    ng-click="setPage()">
											<a href ng-bind="n + 1">1</a>
										</li>
										<li ng-class="{disabled: (currentPage) == pagedItems.length - 1}">
											<a href ng-click="nextPage()">›</a>
										</li>
										<li ng-class="{disabled: (currentPage) == pagedItems.length - 1}" ng-show="pagedItems.length > 5" ng-click="setPage(pagedItems.length-1)">
											<a href>»</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="block">
						<h2 class="title_h2">Activités passées</h2>

						<table>
							<thead>
								<tr>
									<th>Date</th>
									<th>Matiere</th>
									<th>Salle</th>
									<th>Évaluation</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>19/01/16</td>
									<td>Musique</td>
									<td>B206</td>
									<td>
										<div class="row">
											<div class="col-md-3 col-sm-3 col-xs-3 glyphicon glyphicon-comment c-warning icon"></div>
											<div class="col-md-3 col-sm-3 col-xs-3 glyphicon glyphicon-book c-grey icon"></div>
											<div class="col-md-3 col-sm-3 col-xs-3 glyphicon glyphicon-star c-grey icon"></div>
										</div>
									</td>
								</tr>
								<tr>
									<td>19/01/16</td>
									<td>Français</td>
									<td>A305</td>
									<td>
										<div class="row">
											<div class="col-md-3 col-sm-3 col-xs-3 glyphicon glyphicon-comment c-grey icon"></div>
											<div class="col-md-3 col-sm-3 col-xs-3 glyphicon glyphicon-book c-grey icon"></div>
											<div class="col-md-3 col-sm-3 col-xs-3 glyphicon glyphicon-star c-grey icon"></div>
										</div>
									</td>
								</tr>
								<tr>
									<td>19/01/16</td>
									<td>Physique-Chimie</td>
									<td>B304</td>
									<td>
										<div class="row">
											<div class="col-md-3 col-sm-3 col-xs-3 glyphicon glyphicon-comment c-warning icon"></div>
											<div class="col-md-3 col-sm-3 col-xs-3 glyphicon glyphicon-book c-danger icon"></div>
											<div class="col-md-3 col-sm-3 col-xs-3 glyphicon glyphicon-star c-grey icon"></div>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="block">
						<h2 class="title_h2">Notes</h2>
						<div ng-controller="NoteMod">
							<table>
								<thead>
									<tr>
										<th>#</th>
										<th>Date</th>
										<th>Matière</th>
										<th>Note</th>
										<th>Commentaire</th>
									</tr>
								</thead>
								<tbody>
									<tr ng-repeat="item in items | orderBy:sort.sortingOrder:sort.reverse">
										<td>{{item.id}}</td>
										<td>{{item.Date}}</td>
										<td>{{item.Matiere}}</td>
										<td>{{item.Note}}</td>
										<td>{{item.Commentaire}}</td>
									</tr>
									<tr ng-show="items.length == 0">
										<td colspan="5" class="text-center">Aucune note enregistrée</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>