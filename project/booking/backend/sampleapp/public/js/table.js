const search = document.querySelector(".input-group input"),
  table_rows = document.querySelectorAll("tbody tr"),
  table_headings = document.querySelectorAll("thead th");

search.addEventListener("input", searchTable);

function searchTable() {
  table_rows.forEach((row, i) => {
    let table_data = row.textContent.toLowerCase(),
      search_data = search.value.toLowerCase();

    row.classList.toggle("hide", table_data.indexOf(search_data) < 0);
    row.style.setProperty("--delay", i / 25 + "s");
  });

  // Reset background color for visible rows
  document.querySelectorAll("tbody tr:not(.hide)").forEach((visible_row, i) => {
    visible_row.style.background = i % 2 == 0 ? "transparent" : "#0000000b";
  });

  // Reset background color for hidden rows
  document.querySelectorAll("tbody tr.hide").forEach((hidden_row) => {
    hidden_row.style.background = "transparent";
  });
}

/**
 * !Converting HTML table to PDF
 */

const pdf_btn = document.querySelector("#toPDF");
const table_export = document.querySelector("#table_export");

const toPDF = function (table_export) {
  const html_code = `<link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />

    <link rel="stylesheet" href="page-export.css" />

    <section class="table">${table_export.innerHTML}</section>

    <script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    ></script>`;

  const new_window = window.open("url");
  new_window.document.write(html_code);

  setTimeout(() => {
    new_window.print();
    new_window.close();
  }, 200);
};

pdf_btn.onclick = () => {
  toPDF(table_export);
};

/**
 * !Converting HTML table to JSON
 */

const json_btn = document.querySelector("#toJSON");

const toJSON = function (table) {
  let table_data = [],
    t_head = [],
    t_headings = table.querySelectorAll('th'),
    t_rows = table.querySelectorAll('tbody tr');

  for (let t_heading of t_headings) {
    t_head.push(t_heading.textContent.trim().toLowerCase());
  }

  t_rows.forEach(row => {
    const row_object = {};
    const t_cells = row.querySelectorAll('td');

    t_cells.forEach((t_cell, cell_index) => {
      const img = t_cell.querySelector('img');
      if (img) {
        row_object['image'] = decodeURIComponent(img.src);
      }
      row_object[t_head[cell_index]] = t_cell.textContent.trim();
    });

    table_data.push(row_object);
  });

  return JSON.stringify(table_data, null, 4);
};

json_btn.onclick = () => {
  const json = toJSON(table_export);
  downloadFile(json, 'table-export.json');
};

/**
 * !Converting HTML table to CSV
 */
const csv_btn = document.querySelector("#toCSV");

csv_btn.onclick = () => {
  const csvData = toCSV(table_export);
  downloadFile(csvData, 'table-export.csv');
};

const toCSV = function (table) {
  const t_heads = table.querySelectorAll('th');
  const tbody_rows = table.querySelectorAll('tbody tr');

  const headings = [...t_heads].map(head => head.textContent.trim().toLowerCase()).join(',') + ',img';

  const table_data = [...tbody_rows].map(row => {
    const cells = row.querySelectorAll('td');
    const img = row.querySelector('img').src;

    const data_without_img = [...cells].map(cell => cell.textContent.trim().replace(/,/g, '.')).join(',');

    return data_without_img + ',"' + img + '"';
  }).join('\n');

  return headings + '\n' + table_data;
};

const getFileContentType = function (fileType) {
  switch (fileType) {
    case 'json':
      return 'application/json';
    case 'csv':
      return 'text/csv';
    case 'excel':
      return 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
    default:
      return 'application/octet-stream';
  }
}

/**
 * !Converting HTML table to EXCEL
 */

const excel_btn = document.querySelector('#toEXCEL');

const toExcel = function (table) {
  const t_heads = table.querySelectorAll('th');
  const tbody_rows = table.querySelectorAll('tbody tr');

  const headings = [...t_heads].map(head => head.textContent.trim().toLowerCase()).join(',') + ',img';

  const table_data = [...tbody_rows].map(row => {
    const cells = row.querySelectorAll('td');
    const img = row.querySelector('img').src;

    const data_without_img = [...cells].map(cell => cell.textContent.trim().replace(/,/g, '.')).join(',');

    return data_without_img + ',"' + img + '"';
  }).join('\n');

  return headings + '\n' + table_data;
};

excel_btn.onclick = () => {
    const excel = toExcel(table_export);
    downloadFile(excel, 'table-export.xlsx');
}

const downloadFile = function (data, fileType, fileName = '') {
  const a = document.createElement('a');
  a.download = fileName || `table-export.${fileType}`;
  const mime_type = getFileContentType(fileType);
  a.href = `data:${mime_type};charset=utf-8,${encodeURIComponent(data)}`;
  document.body.appendChild(a);
  a.click();
  a.remove();
}

