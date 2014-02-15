<?php

namespace Swagger\Annotations;

/**
 * @license    http://www.apache.org/licenses/LICENSE-2.0
 *             Copyright [2013] [Robert Allen]
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * @package
 * @category
 * @subpackage
 */
use Swagger\Logger;

/**
 * Describes the metadata about the API.
 * @link https://github.com/wordnik/swagger-core/wiki/api-info
 *
 * @package
 * @category
 * @subpackage
 *
 * @Annotation
 */
class Info extends AbstractAnnotation
{

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $termsOfServiceUrl;

    /**
     * @var string
     */
    public $contact;

    /**
     * @var string
     */
    public $license;

    /**
     * @var string
     */
    public $licenseUrl;

    public function validate()
    {
        foreach (array('title', 'description') as $required) {
            if (empty($this->$required)) {
                Logger::notice('Required field "'.$required.'" is missing for "'.$this->identity().'" in '.AbstractAnnotation::$context);
                return false;
            }
        }
        return true;
    }
}
