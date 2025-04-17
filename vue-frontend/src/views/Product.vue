<script>
import { defineComponent } from 'vue'
import ProductService from '@/services/ProductService'

export default defineComponent({
	name: 'Product',
	props: {
		id: {
			type: String,
		},
	},
	data() {
		return {
			product: [],
		}
	},
	computed: {
		inCart() {
			return !!this.$store.getters.inCart(+this.id)
		},
	},
	created() {
		ProductService.getProduct(this.id)
			.then((response) => {
				this.product = response.data
			})
			.catch((error) => {
				console.log(error)
			})
	},
	methods: {
		addToCart(e) {
			e.preventDefault()
			this.$store.commit('addToCart', this.product)
		},
	},
})
</script>

<template v-if="product">
	<div class="breadcrumbs">
		<router-link to="/">Home</router-link>
		<span>/</span>
		<router-link to="/catalog">Catalog</router-link>
		<span>/</span>
		<a>{{ product.name }}</a>
	</div>
	<div class="card-main">
		<div class="card-demo">
			<img :src="'/img/' + product.image" alt="product image" />
			<form class="card-title" method="POST">
				<div>
					<img src="/img/star.png" alt="star" />
					<img src="/img/star.png" alt="star" />
					<img src="/img/star.png" alt="star" />
					<img src="/img/star.png" alt="star" />
					<img src="/img/star.png" alt="star" />
					<span>3 Reviews</span>
				</div>
				<div>
					<h2>{{ product.name }}</h2>
					<h3>
						$ {{ product.price
						}}<small>{{ product.stock }} available</small>
					</h3>
				</div>
				<div>
					<h3>QUANTITY</h3>
					<input
						type="number"
						name="quantity"
						min="1"
						max="10"
						step="1"
						value="1"
						disabled
					/>
				</div>
				<div>
					<button v-if="!inCart" @click="addToCart">
						ADD TO CART
					</button>
					<button v-else disabled>ALREADY IN CART</button>
				</div>
			</form>
		</div>
		<div class="card-desc">
			<h2>DESCRIPTION</h2>
			<div>
				<p>
					Return to the Kanto region and experience a classic Pokémon
					journey in a whole new way with Pokémon: Let\'s Go, Eevee!
					This title was created by GAME FREAK, the developers of the
					Pokémon core RPG titles. Pokémon: Let\'s Go, Eevee!
					introduces a new play style that anyone can enjoy, combined
					with the fun of collecting Pokémon.
				</p>
				<p>
					Pokémon: Let\'s Go, Eevee! is based on Pokémon Yellow:
					Special Pikachu Edition, which first launched in Japan in
					1998. This updated version has been reimagined to make the
					most of the unique capabilities of the Nintendo Switch. The
					game also captures the fun of Pokémon GO and its intuitive
					Pokémon-catching mechanic.
				</p>
				<p>ESRB Age Rating: Everyone</p>
				<ul>
					<li>
						Exclusively for Nintendo Switch (console sold
						separately)
					</li>
					<li>
						Transfer Pokémon from Pokémon GO to Pokémon: Let\'s Go,
						Eevee!
					</li>
					<li>
						Compatible with the Poké Ball Plus accessory (sold
						separately)
					</li>
				</ul>
				<p>
					<b>
						Games and systems sold separately. Internet access and
						Nintendo Account required for additional gameplay
						features. For more info, visit support.nintendo.com.
						<p>Platform: Nintendo Switch</p>
						<p><b>Recommended Age: Rating Pending</b></p>
					</b>
				</p>
				<p><b>More Details:</b></p>
				<ul>
					<li>Item Dimensions: 0.43 x 4.13 x 6.69 IN</li>
					<li>Country Of Origin: Made in Japan</li>
					<li>Care Instructions: SEE "NINTENDO PRODUCT WARRANTY"</li>
					<li>ESRB Age Rating: everyone</li>
					<li>Item Weight: 0.13 LB</li>
				</ul>
				<p>
					<b>Estimated Delivery Time:</b> 5-9 business days with
					Standard shipping. See Shipping details
				</p>
				<p>
					<b>Return Policy:</b> We will gladly accept returns within
					30 days of the date of delivery, excluding items that are
					final sale. See Return Policy details
				</p>
				<p>SKU: 716-59397</p>
			</div>
		</div>
		<div class="card-review">
			<h2>REVIEWS</h2>
			<div>
				<div class="user">
					<img src="/img/user.png" alt="userphoto" />
					<div class="review">
						<h3>Savolous</h3>
						<p>
							Its really hard to review an Item that doesnt come
							out till november. However the magikarp plush I got
							as well is super cute.
						</p>
					</div>
				</div>
				<div class="user">
					<img src="/img/user.png" alt="userphoto" />
					<div class="review">
						<h3>Raakkillie</h3>
						<p>
							This little Eevee is perfect! The quality is
							wonderful. The face is as close to the cartoon as it
							could possibly be. It is soft enough for a child to
							hold - which is important in the case, as it is a
							Christmas gift for a very young fan.
						</p>
					</div>
				</div>
				<div class="user">
					<img src="/img/user.png" alt="userphoto" />
					<div class="review">
						<h3>Overwolf94</h3>
						<p>
							Since this is a pre-order and the game is not been
							released yet this is a pretty stupid question.
							Sounds like Pokémon center better wake up.
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
<style scoped>
@import '../assets/styles/product.css';
</style>
