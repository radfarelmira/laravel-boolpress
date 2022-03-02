<template>
    <section>
        <div class="container">
            <h1>I nostri post</h1>
        </div>
    </section>
</template>

<script>
export default {
    name: 'Posts',
    data: function () {
        return {
            posts: []
        };
    },
    methods: {
        getPosts: function() {
            axios.get('/api/posts')
            .then((response)=>{
                this.posts = response.data.results
                console.log(this.posts);
            });
        }
    },
    created: function(){
        this.getPosts();
    }
}
</script>