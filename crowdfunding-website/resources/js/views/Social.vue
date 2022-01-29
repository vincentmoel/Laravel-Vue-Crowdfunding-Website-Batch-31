<template>
    <h1></h1>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'

export default{
    data(){
        return {
            code : '',
            provider : ''
        }
    },
    computed : {
        ...mapGetters({
            user : 'auth/user'
        })
    },

    methods : {
        ...mapActions({
            setAlert : 'alert/set',
            setAuth : 'auth/set',
            setDialogStatus : 'dialog/setStatus'
        }),
        go(provider, code){
            let url = '/api/social/' + provider + '/callback?code=' + code
            axios.get(url)
                .then((response)=>{
                    let {data} = response.data
                    this.setAuth(data)
                    if(this.user.user.id.length>0)
                    {
                        this.setAlert({
                            status : true,
                            color : 'success',
                            text : 'Login Success'
                        })
                        this.setDialogStatus(false)
                        this.$router.push({name : 'home'})
                    }else
                    {
                        this.setAlert({
                            status : true,
                            color : 'error',
                            text : 'Login2 Failed'
                        })
                    }
                })
                .catch((error) => {
                    console.log(error)
                    this.setAlert({
                        status : true,
                        text : 'Login1 Failed',
                        color : 'error'
                    })
                })
        }
    },
    mounted(){
        this.code = this.$route.query.code
        this.provider = this.$route.path.split('/')[2]
        this.go(this.provider, this.code)
    }
}
</script>
