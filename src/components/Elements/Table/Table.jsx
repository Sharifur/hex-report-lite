// import {th, tr} from "@faker-js/faker";
import "../../../assets/scss/elements/table.scss";
export default function Table({children=false,extraClass="default",info,pagination,padd}){
    const  style = padd !== null ? {padding: `${padd}px`} : {};
    return (
      <div className={`table table-${extraClass}`} style={style}>
          <table>
              { children }
          </table>
          <div className="table-bottom-wrap">
              <div className="leftwrap">
                  {info ? (
                      <div className="infowrap">{`Showing ${info.current} to ${info.items} of total ${info.total} entries`}</div>
                  ) : ''}
              </div>
              <div className="rightWrap">
                  {
                      pagination ? (
                              <div className="pagination">
                                  <a className="prev"><i className="las la-angle-left"></i> Prev</a>
                                  <span className="currentPage">{pagination.current}</span>
                                  <a className="next">Next <i className="las la-angle-right"></i></a>
                              </div>
                          )
                          : ""
                  }
              </div>
          </div>

      </div>
    );
}
