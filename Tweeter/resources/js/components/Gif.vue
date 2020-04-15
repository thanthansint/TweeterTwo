<template>
    <div>
        <div class="gif-setting">
            <input type="text" v-model="gifinput" placeholder="GIF Comment">
        </div>
        <div>
            <button v-if="searchGif" @click="gifClick" class="btn-small pink darken-1" id="border-style" type="submit">Search</button>
            <button v-if="gotGif" @click="saveClick" class="btn-small pink darken-1 toggled: isToggled" id="border-style" type="submit">Save</button>
        </div>
        <div>
            
            <p v-if="isSaved" class="gif-setting">{{ name }}</p>
            <img v-if="gifcontent" :src="gifcontent" v-show="isDeleted == false" alt="gif image" class="gif-image"><br>
            <button v-if="gifcontent && isDeleted == false && isSaved" @click="deleteGif" class="btn-small pink darken-1" id="border-style" type="submit">Delete</button>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        userid: {
            type: Number,
            required: true
        },
        tweetid: {
            type: Number,
            required: true
        },
        username: {
            type: String,
            required: true
        }
    },
    data: function() {
        return {
            gifcontent: this.gifcontent,
            gifinput: '',
            name: this.username,
            userId: this.userid,
            tweetId: this.tweetid,
            gotGif: false,
            searchGif: true,
            isDeleted: false,
            isSaved: false
        }
    },
    methods: {
        gifClick: function() {

            const api= 'https://api.giphy.com/v1/gifs/random';
            const apikey= 'lIErgxFBnAzqCli8CsZrLfQonAKwmFFk';
            const query= '&tag='+this.gifinput;
            const rating = 'pg';

            axios.get(api+'?q='+this.gifinput+'&rating='+rating+'&apikey='+apikey)
                .then(
                    response => {
                       
                        this.gifcontent = response.data.data.images.original.url;
                        this.gifinput = '';
                        this.gotGif = true;
                        this.searchGif = false;
                    })
                .catch( error => {
                        console.log(error.response);
                    });
        },
        saveClick: function() {
            axios.post("/saveGif",{
                    tweetid: this.tweetid,
                    userid: this.userid,
                    gifcontent: this.gifcontent
                })
                .then(
                    response => {
                        //console.log(response.message);
                        this.gotGif = false;
                        this.searchGif = true;
                        this.isSaved = true;
                })
                .catch( error => {
                        console.log(error.response);
                });
        },
        deleteGif: function() {
            axios.post("/deleteGif",{
                    tweetid: this.tweetid,
                    userid: this.userid,
                    gifcontent: this.gifcontent
                })
                .then(
                    response => {
                        console.log(response.message);
                        this.isDeleted = true;
                        this.isSaved = false;
                })
                .catch( error => {
                        console.log(error.response);
                });

        }
    }

}
</script>

<style scoped>
.gif-setting{
    padding-top: 50px;
}
.gif-image {
    margin-top: 30px;
    width: 200px;
    height: 150px;
    object-fit: cover;
}

</style>
