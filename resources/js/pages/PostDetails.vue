<template>
    <section>
        <div class="container">
            <h1>Post Details</h1>

            <div>Category: </div>

            <div>tags</div>

            <p>post Details content</p>
        </div>
    </section>
</template>

<script>
export default {
    name: 'PostDetails',
    data: function () {
        return {
            $post: false,
        };
    },
    methods: {
        getPost: function (){
            axios.get('/api/posts/' + this.$route.params.slug)
            .then((response)=>{
                if (response.data.success) {
                    this.post = response.data.results;
                } else {
                    this.$router.push({ name: 'not-found'});
                }
            });

        }
    },
    created: function (){
        this.getPost();
    }
}
</script>