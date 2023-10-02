export default function Select({name,options,value,extraClass="",mb=0}){
    const style = mb !== null ? {marginBottom: `${mb}px`} : {};
    return (
        <div className={`selectWrap ${extraClass}`} >
            <select name={name} className="selectField" style={style}>
                {options.map(({val,text},index) => (
                    <option key={index} value={val}>{text}</option>
                ))}
            </select>
        </div>
    )
}
