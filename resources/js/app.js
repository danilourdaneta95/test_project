
new Vue({
    el: '#list',
    created: function () {
        this.getCategories();
    },
    data: {
        categories: []
    },
    methods: {
        getCategories: function () {
            var urlCategories = '/getCategories';
            axios.get(urlCategories).then(response => {
                this.categories = response.data
            })
        }
    }
});
