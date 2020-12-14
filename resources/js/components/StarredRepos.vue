<template>
    <div class="card mt-2">
        <div class="card-header">Starred Repos</div>

        <div class="card-body">
            <h3>Fetch Starred Repos</h3>
            <div v-if="starredRepos.length == 0">
                <b-button v-if="isLoading">
                    Getting Your Data <b-icon-stopwatch />
                </b-button>
                <b-button
                    v-else
                    variant="outline-primary"
                    :disabled="user.token == null"
                    @click.prevent="fetchRepos"
                >
                    Get Starred Repos
                </b-button>
            </div>

            <div v-else>
                <b-list-group>
                    <b-list-group-item
                        v-for="(repo, i) in starredRepos"
                        :key="repo.id"
                        >{{ i + 1 }} - {{ repo.html_url }}</b-list-group-item
                    >
                </b-list-group>
            </div>
        </div>
        <b-toast id="error-toast" title="BootstrapVue" static no-auto-hide>
        </b-toast>
    </div>
</template>

<script>
export default {
    props: ["user"],
    data() {
        return {
            isLoading: false,
            starredRepos: []
        };
    },
    methods: {
        fetchRepos() {
            this.isLoading = true;
            axios
                .post(`/github/repo/starred`)
                .then(res => {
                    this.starredRepos = res.data;
                    this.isLoading = false;
                })
                .catch(e => {
                    this.showToast(e.response.data.error);
                    this.isLoading = false;
                });
        },
        showToast(msg) {
            this.$bvToast.toast(msg, {
                title: "Error in fetching repos",
                autoHideDelay: 5000,
                variant: "danger"
            });
        }
    }
};
</script>

<style></style>
