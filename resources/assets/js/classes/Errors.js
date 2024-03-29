export class Errors{

    /**
     * Create a new Errors instance.
     */
    constructor(){
        this.errors = {};
    }

    /**
     * Retrieve the error message for a field.
     *
     * @param {string} field
     */
    get(field){
        if(field in this.errors){
            return this.errors[field][0];
        }
    }
    /**
     * Record the new errors.
     *
     * @param {object} errors
     */
    record(errors){
        this.errors = errors
    }

    /**
     * Clear one or all error fields.
     *
     * @param {string|null} field
     */
    clear(field){
        if (field) {
            delete this.errors[field];
            return;
        }
        this.errors =  {};
    }

    /**
     * Determine if we have any errors.
     */
    any(){
        return Object.keys(this.errors).length > 0;
    }
}