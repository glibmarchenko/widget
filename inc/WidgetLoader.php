<?php

/**
 * Class WidgetLoader
 */
class WidgetLoader
{
    private $id;
    private $data;

    public function __construct($id)
    {
        $this->id = $id;
        $this->loadConfig($id);
    }

    protected function loadConfig($id)
    {
        $widgetName = 'widget-' . $id;
        $widgetPath = WIDGETS_PATH . "/{$widgetName}.json";

        if (file_exists($widgetPath)) {
            $this->data = json_decode(file_get_contents($widgetPath));
        } else {
            throw new UnexpectedValueException('Widget: Unknown widget id!');
        }
    }

    public function retrieveBody()
    {
        $type = $this->data->type;
        $tplPath = TEMPLATES_PATH . "/{$type}.php";

        if (file_exists($tplPath)) {
            $id = 'widget-' . $this->id;
            $unique = $id . '-';
            $importFontUrl = $this->data->style->font;
            $fontName = $this->data->style->font_name;
            $textColor = $this->data->style->text_color;
            $modalBg = $this->data->style->modal_bg;

            $fields = '';

            foreach ($this->data->fields as $field) {
                switch($field->name) {
                    case "title":
                        $fields .= '<p class="title">' . $field->content . '</p>';
                        break;
                    case "description":
                        $fields .= '<p class="description">' . $field->content . '</p>';
                        break;
                    case "bullets":
                        $fields .= $this->bulletsRender($field);
                        break;
                    case "button":
                        $fields .= '<div class="btn-wrap"><button type="button" class="btn btn-primary">Save changes</button></div>';
                        break;
                }
            }

            ob_clean();
            include_once $tplPath;
            return ob_get_clean();
        } else {
            throw new UnexpectedValueException('Widget: Unknown widget type!');
        }
    }

    private function bulletsRender($field) {
        $output = '<ul class="' . $field->name . '">';
        foreach($field->content as $bullet) {
            $output .= '<li><input type="checkbox" name="' . $bullet . '"/>' . $bullet . '</li>';
        }
        $output .= '</ul>';

        return $output;
    }
}
