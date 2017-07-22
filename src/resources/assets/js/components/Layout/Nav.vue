<template>

    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Branding Image -->
                <a class="navbar-brand" href="#">
                    <span v-text='user.name'></span>
                    <!-- <a href='javascript:;' @click='notify'>Notification</a> -->
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">

                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav navbar-left" v-if='loggedIn'>
                    <li><router-link :to='{name: "profile", params:{id: user_id }}'>Profile</router-link></li>
                    <li><router-link :to='{name: "sell-myitem"}'>Items for Sale</router-link></li>
                    <li><a href='#'>Items on Demand</a></li>
                    <li><a href='#'>Dashboard</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <li v-if='!loggedIn'><a href='/login'>Login</a></li>
                    <li v-if='!loggedIn'><a href='/register'>Register</a></li>
                    <li v-if='loggedIn && !smsenabled'><a href='/globe/subscribe'>Enable SMS Notification</a></li>
                    <li v-if='loggedIn'><a href='/logout'>Logout</a></li>
                </ul>
                
            </div>
        </div>
    </nav>

</template>
<script>
export default {
    computed: {
        loggedIn() {
            this.user_id = this.user.id;
            return this.user.id;
        },
        user() {
            return this.$store.state.user;
        },
        smsenabled() {
            return this.user.subscription != null;
        }
    },
    data() {
        return {
            user_id: 'NULL',
        }
    },
    methods: {
        notify() {
            alert('notify');
        }
    },
    mounted() {
        this.user_id = this.user.id;

        //console.log('asda');
        //console.log(this.user.subscription);
        //this.user_id = this.user.id;
        //console.log(user.id);
        //console.log('mounted', this.user);
    }
}
</script>