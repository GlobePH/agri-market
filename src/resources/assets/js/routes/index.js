import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

const guest = [
	{ path: '/', name: 'home', component: require('../components/Home'), },
	{ path: '/sell', name: 'sell', component: require('../components/Sell/Index') },
	{ path: '/sell/:id/show', name: 'sell-show', component: require('../components/Sell/Show') },
	{ path: '/buy', name: 'buy', component: require('../components/Buy/Index') },
]

const auth = [
	{ path: '/sell/myitem', name: 'sell-myitem', component: require('../components/Sell/MyItem') },
	{ path: '/sell/create', name: 'sell-create', component: require('../components/Sell/Create') },
	{ path: '/sell-change-status/:id/:status', name: 'sell-change-status' },
	{ path: '/sell/:id/edit', name: 'sell-edit', component: require('../components/Sell/Edit') },
	{ path: '/sell/:id/photo', name: 'sell-photo', component: require('../components/Sell/Photo') },

	{ path: '/buy/create', name: 'buy-create', component: require('../components/Buy/Create') },

	{ path: '/user/:id/profile', name: 'profile', component: require('../components/User/Profile') },
];

const router = new VueRouter({
	routes: [
		...guest,
		...auth.map(item => {
			item.meta = Object.assign(item.meta || {}, { guard: 'auth' });
			return item;
		}),
	]
});


router.beforeEach((to, from, next) => {
	if (to.meta.guard == 'auth') {
		if (window.user.id) {
			next();
		} else {
			window.location.href = '/login';
		}
	} else {
  	next();
  }
})


export default router;