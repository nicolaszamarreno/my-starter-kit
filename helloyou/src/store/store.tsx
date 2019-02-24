import { observable, action } from "mobx";

export class Store {
    @observable property = "Observable Propriety";

    @action.bound
    setProperty(_property: string) {
        this.property = _property;
    }
}
