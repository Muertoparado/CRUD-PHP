let headers = new Headers({"Content-Type": "application/json"});

const get= async ()=>{
    console.log("get");
    let config={
        method:"GET",
        headers:headers
    };
    return await (await fetch(`http://localhost/CRUD-PHP/backend/${tabla}/`, config)).json();
    
}

const getId= async (arg)=>{
    console.log("get");
    let config={
        method:"GET",
        headers:headers
    };
    return await (await fetch(`http://localhost/CRUD-PHP/backend/${tabla}/${arg.id}`, config)).json();
    
}

const post = async ()=>{
    console.log("post");
    let config ={
        method:"POST",
        headers : headers,
       // body:JSON.stringify(arg)
    };
    return await (await fetch(`http://localhost/CRUD-PHP/backend/${tabla}/add`, config)).json();
}

const delet = async (arg)=>{
    console.log("delete");
    let config ={
        method:"DELETE",
        headers : headers,
    };
    return await (await fetch(`http://localhost/CRUD-PHP/backend/${tabla}/delete/${arg.id}`, config)).json();

}
const put = async (arg)=>{
    console.log("put");
    let config ={
        method:"PUT",
        headers : headers,
       /* body:JSON.stringify(arg) */
    };
    return await (await fetch(`http://localhost/CRUD-PHP/backend/${tabla}/put/${arg.id}`, config)).json();

}

export default {
    get,
    post,
    delet,
    put,
    getId
}