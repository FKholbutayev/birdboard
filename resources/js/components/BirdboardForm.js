import axios from "axios";

class BirdBoard {
    constructor(data) {
        this.originalData = JSON.parse(JSON.stringify(data))
        console.log("data", this.originalData);

        Object.assign(this, data)
        console.log("cetama voobshe", this.data())
    }

    data() {
        let data = {}
        for(let attribute in this.originalData) {
            data[attribute] = this[attribute]
        }
        console.log("data attribute", data)

        return data
    }



    submit(endpoint) {
        axios.post(endpoint, this);
    }
}

export default BirdBoard
