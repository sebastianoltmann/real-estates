
window.publishDocument = () => ({
    published: false,
    publishedAt: null,
    publishedAtFirst: null,
    hasCustomPublishedData: false,
    togglePublishNow(event) {
        if (event.target.checked) {
            console.log(this.getNowDateIsoString());
            this.publishedAt = this.checkPublishedAtFirst()
                ? this.publishedAtFirst
                : this.getNowDateIsoString();

            this.hasCustomPublishedData = false;
        } else
            this.publishedAt = null
    },

    toggleCustomPublishDate(event){
        if (event.target.checked) {
            this.published = false;

            if(!this.checkPublishedAtFirst()){
                this.publishedAt = this.publishedAtFirst
            }
        } else{
            this.publishedAt = null;
        }
    },

    checkPublishedAtFirst(){
        if(!this.publishedAtFirst)
            return false

        const firstData = new Date(this.publishedAtFirst);
        const nowData = new Date();
        return nowData > firstData
    },

    getNowDateIsoString(){
        const now = new Date();
        now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
        return now.toISOString().slice(0,10);
    }
});
