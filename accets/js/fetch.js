async function getData(route, params = '') {
    if (params != '') {
        route += `?${params}`
    }
    let response = await fetch(route)
    return await response.json()
}

async function postJSON(route, data, action='') {
    let response = await fetch(route,
        {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json;charset=UTF-8'
            },
            body: JSON.stringify({ data, action })
        })
    return await response.json()
}

async function postAddCity(route, data, action='', perem) {
    let response = await fetch(route,
        {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json;charset=UTF-8'
            },
            body: JSON.stringify({ data, action, perem })
        })
    return await response.json()
}

async function postFormData(route, data) {
    let response = await fetch(route,
        {
            method: 'POST',
            body: data
        })
    return await response.json()
}
