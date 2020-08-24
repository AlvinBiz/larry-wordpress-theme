<?php

get_header();
?>

	<div id="primary" class="content-area">
	 <main id="composition-main" class="site-main">
		<h1>Compositions</h1>
		 <div class="comp-div">
      <section class="comp-category-section">
        <div class="comp-category-container">
          <ul class="comp-category-list">
						<li class="all-compositions main-arrangement-type"><button type="button" class="post-type-button">All Compositions</button></li>
		<?php

		$instArr = array();
		$choralArr = array();

		while ( have_posts() ) :
			the_post();

			if (get_field('instrumental_arrangements')) {

				$instArrangement = get_field('instrumental_arrangements');
				$instArrArray = array();

			if (stripos($instArrangement, ', ') !== false) {
				$instArrArray = explode(', ', $instArrangement);
			} elseif (stripos($instArrangement, ',') !== false)
			{$instArrArray = explode(',', $instArrangement);
			} else {$instArrArray[] = $instArrangement;};

			foreach($instArrArray as $instType) {
				if (!in_array($instType, $instArr)) {
				$instArr[] = $instType;
			};
		}
	}

			if (get_field('choral_arrangements')) {

				$choralArrangement = get_field('choral_arrangements');
				$choralArrArray = array();

			if (stripos($choralArrangement, ', ') !== false) {
				$choralArrArray = explode(', ', $choralArrangement);
			} elseif (stripos($choralArrangement, ',') !== false)
			{$choralArrArray = explode(',', $choralArrangement);
			} else {$choralArrArray[] = $choralArrangement;};

			foreach($choralArrArray as $choralType) {
				if (!in_array($choralType, $choralArr)) {
				$choralArr[] = $choralType;
			};
		}
	}

		endwhile;


			echo '<li class="main-arrangement-type"><button type="button" class="post-type-button">Choral</button></li>';
				foreach($choralArr as $choralType) {
					echo '<li class="minor-arrangement-type"><button type="button" class="choral post-type-button">' . $choralType . '</button></li>';
				}

			echo '<li class="main-arrangement-type"><button type="button" class="post-type-button">Instrumental</button></li>';
				foreach($instArr as $instType) {
					echo '<li class="minor-arrangement-type"><button type="button" class="instrumental post-type-button">' . $instType . '</button></li>';
				}



		?>
        </ul>
       </div>

     </section>

		 <section class="results-section">
		 	<div class="search-results-div">
				<ul class="search-results">
					<?php

					while ( have_posts() ) :
						the_post();

						if (get_field('choral_arrangements')) {
							$choralString = str_replace(', ', ',', get_field('choral_arrangements')); // Replaces all spaces with hyphens.
							$choralString = preg_replace('/[^A-Za-z0-9,\-]/', '-', $choralString); // Removes special chars.
							$choralString = strtolower($choralString); // Convert to lowercase
							$choralArr = explode(',', $choralString);
						}


						if (get_field('instrumental_arrangements')) {
							$instString = str_replace(', ', ',', get_field('instrumental_arrangements')); // Removes all spaces.
							$instString = preg_replace('/[^A-Za-z0-9,\-]/', '-', $instString); // Removes special chars.
							$instString = strtolower($instString); // Convert to lowercase
							$instArr = explode(',', $instString);
						}

							echo '<li class="composition';
							if(get_field('choral_arrangements')) {echo " choral";
								foreach($choralArr as $choral) {
									echo " " . $choral;
								};
							};
							if(get_field('instrumental_arrangements')) {echo " instrumental";
								foreach($instArr as $inst) {
									echo " " . $inst;
								};
							};
							echo'"><a href="' . get_permalink() . '">' . get_the_title() . '</a></button></li>';


					endwhile;
					?>
				</ul>
		 	 </div>
		  </section>
		 </div>
		</main>
	</div>

<?php
get_footer();
