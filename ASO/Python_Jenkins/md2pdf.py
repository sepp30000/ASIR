import argparse
import markdown2
from weasyprint import HTML

def markdown_to_pdf(input_file, output_file):
    # Leer el archivo markdown
    with open(input_file, 'r', encoding='utf-8') as f:
        markdown_content = f.read()

    # Convertir el contenido Markdown a HTML
    html_content = markdown2.markdown(markdown_content)

    # Crear un objeto HTML con el contenido HTML
    html = HTML(string=html_content)

    # Guardar el PDF
    html.write_pdf(output_file)

if __name__ == "__main__":
    # Configurar los argumentos de línea de comandos
    parser = argparse.ArgumentParser(description='Convierte un archivo Markdown a PDF.')
    parser.add_argument('input', help='Ruta al archivo de entrada Markdown')
    parser.add_argument('output', help='Ruta al archivo de salida PDF')
    args = parser.parse_args()

    # Convertir Markdown a PDF
    markdown_to_pdf(args.input, args.output)

    print("¡La conversión se ha completado con éxito!")
