<template>
    <div class="setting">
        <button v-if= 'Islike == 0' @click="likeClick" class="btn-tiny blue-text text-darken-5 light-green lighten-5" id="border-style" type="submit"><strong><i class="material-icons">favorite</i></strong></button>
        <button v-else-if= 'Islike == 1' @click="likeClick" class="btn-tiny red-text text-darken-5 light-green lighten-5" id="border-style" type="submit"><strong><i class="material-icons">favorite</i></strong></button>

        <p>{{ likeIncrease }}</p>
    </div>
</template>

<script>
export default {
    props: {
        likes: {
            type: Number,
            required: true
        },
        likeCount: {
            type: Number,
            required: true
        },
        userid: {
            type: Number,
            required: true
        },
        tweetid: {
            type: Number,
            required: true
        }
    },
    data: function() {
        return {
            userId: this.userid,
            tweetId: this.tweetid,
            likeIncrease: 0,
            Islike: 0
    }
    },
    methods: {
        likeClick: function(){            
             if (this.likes==0 && this.Islike == 0) {
                    axios.post("/likeCount", {
                    tweetid: this.tweetid
                })
                .then(
                    response => {
                        this.likeIncrease = this.likeCount +1;
                        this.Islike = 1;
                    })
                .catch( error => {
                        console.log(error.response);
                    });
            }else if (this.Islike == 1) {
                axios.post("/unlikeCount", {
                    tweetid: this.tweetid
                })
                .then(
                    response => {
                        this.likeIncrease -= 1;
                        this.Islike = 0;
                    })
                .catch( error => {
                        console.log(error.response);
                    });
            }

        }
    }
}
</script>

<style scoped>
.setting{
    padding-top: 20px;
}

</style>
